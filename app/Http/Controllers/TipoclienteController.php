<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TipoclienteRequest;

use App\Tipocliente;
use Illuminate\Support\Facades\Redirect;
use DB;

class TipoclienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:tcliente.create')->only(['create', 'store']);
        $this->middleware('can:tcliente.index')->only(['index']);
        $this->middleware('can:tcliente.edit')->only(['edit', 'update']);
        $this->middleware('can:tcliente.show')->only(['show']);
        $this->middleware('can:tcliente.destroy')->only(['destroy']);
        $this->middleware('can:tcliente.pdf')->only(['pdf']);
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
            $tclientes=DB::table('tipoclientes as f')
            ->select('f.id','f.nombre','f.descripcion','f.estatus')
            ->where('f.nombre','LIKE','%'.$sql.'%')
            ->orwhere('f.descripcion','LIKE','%'.$sql.'%')
            ->orderBy('f.id','desc')
            ->paginate(5);

            return view('tcliente.index',["tclientes"=>$tclientes, "buscarTexto"=>$sql]);

        }
    }


    public function create()
    {
        return view('tcliente.create',[
            'tcliente' => new Tipocliente
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoclienteRequest $request)
    {
        //
        $tcliente= new Tipocliente();
        $tcliente->nombre = $request->nombre;
        $tcliente->descripcion = $request->descripcion;
        $tcliente->estatus = '1';

        $tcliente->save();
        return Redirect::to("tcliente")->with('success', 'Tipo cliente guardado con éxito.');
    }


    public function edit($id)
    {
        $tcliente = Tipocliente::find($id);

        return view('tcliente.edit', compact('tcliente'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipoclienteRequest $request, $id)
    {
        $tcliente = Tipocliente::find($id);

        $tcliente->fill($request->all())->save();
        return Redirect::to("tcliente")->with('success', 'Tipo cliente actualizado con éxito.');
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
            $tcliente= Tipocliente::findOrFail($request->id);

            if($tcliente->estatus=="1"){
                $tcliente->estatus= '0';
                $tcliente->save();
                return Redirect::to("tcliente")->with('success', 'Tipo cliente actualizado con éxito.');

            } else{

                $tcliente->estatus= '1';
                $tcliente->save();
                return Redirect::to("tcliente")->with('success', 'Tipo cliente actualizado con éxito.');

            }
    }

       public function listarPdf(){


            $cont=Tipocliente::count();

            $pdf= \PDF::loadView('pdf.tclientespdf',['tclientes'=>$tclientes,'cont'=>$cont]);
            return $pdf->download('tclientes.pdf');

    }
}
