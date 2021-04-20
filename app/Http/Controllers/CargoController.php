<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CargoRequest;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Carbon;
use App\Cargo;
use DB;

class CargoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:cargo.create')->only(['create', 'store']);
        $this->middleware('can:cargo.index')->only(['index']);
        $this->middleware('can:cargo.edit')->only(['edit', 'update']);
        $this->middleware('can:cargo.show')->only(['show']);
        $this->middleware('can:cargo.destroy')->only(['destroy']);
        $this->middleware('can:cargo.pdf')->only(['pdf']);
    }

    public function exportPdf(Request $request){

        $sql=trim($request->get('desde'));
        $sql2=trim($request->get('hasta'));


        $cargos=DB::table('cargos as c')
            ->select('c.id','c.nombre','c.descripcion','c.estatus','c.created_at')
            ->where('c.created_at','LIKE','%'.$sql.'%')
            ->orwhere('c.created_at','LIKE','%'.$sql2.'%')
            ->orderBy('c.id','asc')
            ->paginate(5);

        $today = Carbon::now()->format('d/m/Y');
        $pdf = PDF::loadView('pdf.cargos', compact('cargos','today'));

        return $pdf->stream('listado-cargos.pdf');
    }
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){

            $sql=trim($request->get('buscarTexto'));
            $cargos=DB::table('cargos as c')
            ->select('c.id','c.nombre','c.descripcion','c.estatus')
            ->where('c.nombre','LIKE','%'.$sql.'%')
            ->orwhere('c.descripcion','LIKE','%'.$sql.'%')
            ->orderBy('c.id','desc')
            ->paginate(5);

            return view('cargo.index',["cargos"=>$cargos, "buscarTexto"=>$sql]);

        }
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cargo.create',[
            'cargo' => new Cargo
        ]);
    }

    public function store(CargoRequest $request)
    {
        //
        $cargo= new Cargo();
        $cargo->nombre = $request->nombre;
        $cargo->descripcion = $request->descripcion;
        $cargo->estatus = '1';

        $cargo->save();
        return Redirect::to("cargo")->with('success', 'Cargo guardado con éxito.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $cargo = Cargo::find($id);

        return view('cargo.edit', compact('cargo'));
    }


    public function update(CargoRequest $request, $id)
    {
        $cargo = Cargo::find($id);

        $cargo->fill($request->all())->save();
        return Redirect::to("cargo")->with('success', 'Cargo actualizado con éxito.');
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
            $cargo= Cargo::findOrFail($request->id);

            if($cargo->estatus=="1"){

                $cargo->estatus= '0';
                $cargo->save();
                return Redirect::to("cargo")->with('success', 'Cargo actualizado con éxito.');

            } else{

                $cargo->estatus= '1';
                $cargo->save();
                return Redirect::to("cargo")->with('success', 'Cargo actualizado con éxito.');

            }
    }

       public function listarPdf(){


            $cont=Cargo::count();

            $pdf= \PDF::loadView('pdf.cargospdf',['cargos'=>$cargos,'cont'=>$cont]);
            return $pdf->download('cargos.pdf');

    }
}
