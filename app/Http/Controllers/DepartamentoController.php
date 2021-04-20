<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DepartamentoRequest;
use Illuminate\Support\Facades\Redirect;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Carbon;
use App\Departamento;
use DB;

class DepartamentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:dpto.create')->only(['create', 'store']);
        $this->middleware('can:dpto.index')->only(['index']);
        $this->middleware('can:dpto.edit')->only(['edit', 'update']);
        $this->middleware('can:dpto.show')->only(['show']);
        $this->middleware('can:dpto.destroy')->only(['destroy']);
        $this->middleware('can:dpto.pdf')->only(['pdf']);
    }

    public function exportPdf(Request $request){

        $sql=trim($request->get('desde'));
        $sql2=trim($request->get('hasta'));


        $dptos=DB::table('departamentos as d')
            ->select('d.id','d.nombre','d.descripcion','d.estatus','d.created_at')
            ->where('d.created_at','LIKE','%'.$sql.'%')
            ->orwhere('d.created_at','LIKE','%'.$sql2.'%')
            ->orderBy('d.id','asc')
            ->paginate(5);

        $today = Carbon::now()->format('d/m/Y');
        $pdf = PDF::loadView('pdf.dptos', compact('dptos','today'));

        return $pdf->stream('listado-dptos.pdf');
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){

            $sql=trim($request->get('buscarTexto'));
            $dptos=DB::table('departamentos as d')
            ->select('d.id','d.nombre','d.descripcion','d.estatus')
            ->where('d.nombre','LIKE','%'.$sql.'%')
            ->orwhere('d.descripcion','LIKE','%'.$sql.'%')
            ->orderBy('d.id','desc')
            ->paginate(5);

            return view('dpto.index',["dptos"=>$dptos, "buscarTexto"=>$sql]);

        }
    }
    public function create()
    {
        return view('dpto.create',[
            'dpto' => new Departamento
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartamentoRequest $request)
    {
        //
        $dpto= new Departamento();
        $dpto->nombre = $request->nombre;
        $dpto->descripcion = $request->descripcion;
        $dpto->estatus = '1';

        $dpto->save();
        return Redirect::to("dpto")->with('success', 'Departamento guardado con éxito.');
    }


    public function edit($id)
    {
        $dpto = Departamento::find($id);

        return view('dpto.edit', compact('dpto'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartamentoRequest $request, $id)
    {
        //
        $dpto = Departamento::find($id);

        $dpto->fill($request->all())->save();
        return Redirect::to("dpto")->with('success', 'Departamento actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
            $dpto= Departamento::findOrFail($request->id);

            if($dpto->estatus=="1"){
                $dpto->estatus= '0';
                $dpto->save();
                return Redirect::to("dpto")->with('success', 'Departamento actualizado con éxito.');

            } else{

                $dpto->estatus= '1';
                $dpto->save();
                return Redirect::to("dpto")->with('success', 'Departamento actualizado con éxito.');

            }
    }

       public function listarPdf(){


            $cont=Departamento::count();

            $pdf= \PDF::loadView('pdf.dptospdf',['dptos'=>$dptos,'cont'=>$cont]);
            return $pdf->download('dptos.pdf');

    }
}
