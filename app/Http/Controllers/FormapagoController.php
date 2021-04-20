<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormapagoRequest;
use Illuminate\Support\Str;
use App\Formapago;
use Illuminate\Support\Facades\Redirect;
use DB;

class FormapagoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:fpago.create')->only(['create', 'store']);
        $this->middleware('can:fpago.index')->only(['index']);
        $this->middleware('can:fpago.edit')->only(['edit', 'update']);
        $this->middleware('can:fpago.show')->only(['show']);
        $this->middleware('can:fpago.destroy')->only(['destroy']);
        $this->middleware('can:fpago.pdf')->only(['pdf']);
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
            $fpagos=DB::table('formapagos as f')
            ->select('f.id','f.nombre','f.descripcion','f.estatus')
            ->where('f.nombre','LIKE','%'.$sql.'%')
            ->orwhere('f.descripcion','LIKE','%'.$sql.'%')
            ->orderBy('f.id','desc')
            ->paginate(5);

            return view('fpago.index',["fpagos"=>$fpagos, "buscarTexto"=>$sql]);

        }
    }


    public function create()
    {
        return view('fpago.create',[
            'fpago' => new Formapago
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(FormapagoRequest $request)
    {
        //
        $fpago= new Formapago();
        $fpago->nombre = $request->nombre;
        $fpago->descripcion = $request->descripcion;
        $fpago->estatus = '1';

        $fpago->save();
        return Redirect::to("fpago")->with('success', 'Forma de pago guardado con éxito.');
    }

    public function edit($id)
    {
        $fpago = Formapago::find($id);

        return view('fpago.edit', compact('fpago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormapagoRequest $request, $id)
    {
        $fpago = Formapago::find($id);
        $fpago->fill($request->all())->save();
        return Redirect::to("fpago")->with('success', 'Forma de pago actualizado con éxito');
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
            $fpago= Formapago::findOrFail($request->id);

            if($fpago->estatus=="1"){
                $fpago->estatus= '0';
                $fpago->save();
                return Redirect::to("fpago")->with('success', 'Forma de pago actualizado con éxito.');

            } else{

                $fpago->estatus= '1';
                $fpago->save();
                return Redirect::to("fpago")->with('success', 'Forma de pago actualizado con éxito.');

            }
    }

       public function listarPdf(){


            $cont=Formapago::count();

            $pdf= \PDF::loadView('pdf.fpagospdf',['fpagos'=>$fpagos,'cont'=>$cont]);
            return $pdf->download('fpagos.pdf');

    }
}
