<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ConceptoRequest;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Carbon;
use App\Naturaleza;
use App\Concepto;
use DB;

class ConceptoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:conceptos.create')->only(['create', 'store']);
        $this->middleware('can:conceptos.index')->only(['index']);
        $this->middleware('can:conceptos.edit')->only(['edit', 'update']);
        $this->middleware('can:conceptos.show')->only(['show']);
        $this->middleware('can:conceptos.destroy')->only(['destroy']);
        $this->middleware('can:conceptos.pdf')->only(['pdf']);
    }

    public function exportPdf(Request $request){

        $sql=trim($request->get('desde'));
        $sql2=trim($request->get('hasta'));


        $conceptos=Concepto::join('naturalezas','conceptos.codnaturaleza','=','naturalezas.id')
            ->select('conceptos.id','conceptos.nombre','naturalezas.nombre as naturaleza','conceptos.descripcion','conceptos.estatus','conceptos.created_at')
            ->where('conceptos.created_at','LIKE','%'.$sql.'%')
            ->orwhere('conceptos.created_at','LIKE','%'.$sql.'%')
            ->orderBy('conceptos.id','asc')
            ->paginate(8);

        $today = Carbon::now()->format('d/m/Y');
        $pdf = PDF::loadView('pdf.conceptos', compact('conceptos','today'));

        return $pdf->stream('listado-conceptos.pdf');
    }

    public function index(Request $request)
    {
        if($request){

            $sql=trim($request->get('buscarTexto'));
            $conceptos=Concepto::join('naturalezas','conceptos.codnaturaleza','=','naturalezas.id')
            ->select('conceptos.id','conceptos.nombre','naturalezas.nombre as naturaleza','conceptos.descripcion','conceptos.estatus')
            ->where('conceptos.nombre','LIKE','%'.$sql.'%')
            ->orwhere('conceptos.descripcion','LIKE','%'.$sql.'%')
            ->orderBy('conceptos.id','desc')
            ->paginate(8);

            return view('conceptos.index',["conceptos"=>$conceptos, "buscarTexto"=>$sql]);

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
        $naturaleza = Naturaleza::orderBy('nombre', 'DESC')->pluck('nombre', 'id');
        return view('conceptos.create', compact('naturaleza'),[
            'concepto' => new Concepto
        ]);
    }

    public function store(ConceptoRequest $request)
    {
        //
        $conceptos= new Concepto();
        $conceptos->nombre = $request->nombre;
        $conceptos->codnaturaleza = $request->codnaturaleza;
        $conceptos->descripcion = $request->descripcion;
        $conceptos->estatus = '1';

        $conceptos->save();
         return redirect()->route('conceptos.index')
            ->with('success', 'Concepto guardado con éxito.');
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
        $naturaleza = Naturaleza::orderBy('nombre', 'DESC')->pluck('nombre', 'id');
        $conceptos = Concepto::find($id);

        return view('conceptos.edit', compact('conceptos','naturaleza'));
    }

    public function update(ConceptoRequest $request, $id)
    {
        //
        $concepto = Concepto::find($id);

        $concepto->fill($request->all())->save();
        return redirect()->route('conceptos.index')
            ->with('success', 'Concepto actualizado con éxito.');
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
        $concepto= Concepto::findOrFail($request->id);

        if($concepto->estatus=="1"){

            $concepto->estatus= '0';
            $concepto->save();
            return redirect()->route('conceptos.index')
                ->with('success', 'Concepto actualizado con éxito.');
        } else{

            $concepto->estatus= '1';
            $concepto->save();
            return redirect()->route('conceptos.index')
                ->with('success', 'Concepto actualizado con éxito.');
        }
    }

       public function listarPdf(){


            $cont=Concepto::count();

            $pdf= \PDF::loadView('pdf.conceptospdf',['conceptos'=>$conceptos,'cont'=>$cont]);
            return $pdf->download('conceptos.pdf');

    }
}
