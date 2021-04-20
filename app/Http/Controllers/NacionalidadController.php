<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NacionalidadRequest;
use Illuminate\Support\Facades\Redirect;
use App\Nacionalidad;
use DB;

class NacionalidadController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:nacionalidad.create')->only(['create', 'store']);
        $this->middleware('can:nacionalidad.index')->only(['index']);
        $this->middleware('can:nacionalidad.edit')->only(['edit', 'update']);
        $this->middleware('can:nacionalidad.show')->only(['show']);
        $this->middleware('can:nacionalidad.destroy')->only(['destroy']);
        $this->middleware('can:nacionalidad.pdf')->only(['pdf']);
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
            $nacionalidads=DB::table('nacionalidads as n')
            ->select('n.id','n.nombre','n.abreviado','n.estatus')
            ->where('n.nombre','LIKE','%'.$sql.'%')
            ->orwhere('n.abreviado','LIKE','%'.$sql.'%')
            ->orderBy('n.id','desc')
            ->paginate(5);

            return view('nacionalidad.index',["nacionalidads"=>$nacionalidads, "buscarTexto"=>$sql]);

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
        return view('nacionalidad.create',[
            'nacionalidad' => new Nacionalidad
        ]);
    }

    public function store(NacionalidadRequest $request)
    {
        //
        $nacionalidad= new Nacionalidad();
        $nacionalidad->nombre = $request->nombre;
        $nacionalidad->abreviado = $request->abreviado;
        $nacionalidad->estatus = '1';

        $nacionalidad->save();
        return Redirect::to("nacionalidad")->with('success', 'Nacionalidad guardado con éxito.');
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
        $nacionalidad = Nacionalidad::find($id);

        return view('nacionalidad.edit', compact('nacionalidad'));
    }


    public function update(NacionalidadRequest $request, $id)
    {
        //
        $nacionalidad = Nacionalidad::find($id);

        $nacionalidad->fill($request->all())->save();
        return Redirect::to("nacionalidad")->with('success', 'Nacionalidad actualizado con éxito.');
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
            $nacionalidad= Nacionalidad::findOrFail($request->id);

            if($nacionalidad->estatus=="1"){

                $nacionalidad->estatus= '0';
                $nacionalidad->save();
                return Redirect::to("nacionalidad")->with('success', 'Nacionalidad actualizado con éxito.');

            } else{

                $nacionalidad->estatus= '1';
                $nacionalidad->save();
                return Redirect::to("nacionalidad")->with('success', 'Nacionalidad actualizado con éxito.');

            }
    }

       public function listarPdf(){


            $cont=Nacionalidad::count();

            $pdf= \PDF::loadView('pdf.nacionalidadspdf',['nacionalidads'=>$nacionalidads,'cont'=>$cont]);
            return $pdf->download('nacionalidads.pdf');

    }
}
