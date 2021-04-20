<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use App\Http\Requests\ClienteUpdateRequest;
use App\Cliente;
use Barryvdh\DomPDF\Facade as PDF;
use App\Tipocliente;
use App\Nacionalidad;
use Illuminate\Support\Carbon;

use DB;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:cliente.create')->only(['create', 'store']);
        $this->middleware('can:cliente.index')->only(['index']);
        $this->middleware('can:cliente.edit')->only(['edit', 'update']);
        $this->middleware('can:cliente.show')->only(['show']);
        $this->middleware('can:cliente.pdf')->only(['pdf']);
    }

    public function exportPdf(Request $request){

        if($request){
            $sql=trim($request->get('desde'));
            $sql1=trim($request->get('hasta'));
            $sql2=trim($request->get('codtipocliente'));
            // $sql3=trim($request->get('2'));

            $clientes = Cliente::where('created_at','LIKE','%'.$sql.'%')
                ->orwhere('created_at','LIKE','%'.$sql1.'%')
                ->orwhere('codtipocliente','LIKE','%'.$sql2.'%')
                // ->orwhere('codtipocliente','LIKE','%'.$sql3.'%')
                // ->orderBy('id','desc')
                ->paginate(8);

            // $clientes = Cliente::all();
            $today = Carbon::now()->format('d/m/Y');
            $pdf = PDF::loadView('pdf.clientes', compact('clientes','today'));

            return $pdf->stream('listado-clientes.pdf');
        }
    }
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request){
            $sql=trim($request->get('buscarTexto'));

            $clientes = Cliente::join('tipoclientes','clientes.codtipocliente','=','tipoclientes.id')
            ->join('nacionalidads','clientes.codnacionalidad','=','nacionalidads.id')
            ->select('clientes.id','tipoclientes.nombre as tipocliente','clientes.nombres','clientes.apellidos','nacionalidads.abreviado as nacionalidad','clientes.cedula','clientes.direccion','clientes.telefono','clientes.email')
            ->where('nombres','LIKE','%'.$sql.'%')
            ->orwhere('apellidos','LIKE','%'.$sql.'%')
            ->orwhere('cedula','LIKE','%'.$sql.'%')
            ->orderBy('id','desc')
            ->paginate(8);

            $tclientes = Tipocliente::orderBy('nombre', 'DESC')->pluck('nombre', 'id');
            $nacionalidad = Nacionalidad::orderBy('nombre', 'DESC')->pluck('nombre', 'id');
            return view('cliente.index',["clientes"=>$clientes,"tclientes"=>$tclientes,"nacionalidad"=>$nacionalidad,"buscarTexto"=>$sql]);
            //return $clientes;
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
        $cliente = Cliente::get();
        $tclientes = Tipocliente::orderBy('nombre', 'DESC')->pluck('nombre', 'id');
        $nacionalidad = Nacionalidad::orderBy('nombre', 'DESC')->pluck('nombre', 'id');

        return view('cliente.create', compact('cliente','tclientes','nacionalidad'));
    }

    public function store(ClienteRequest $request)
    {
        // $message = request()->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'subject' => 'required',
        //     'content' => 'required|min:3',
        // ]);
        $cliente = Cliente::create($request->all());
        return redirect()->route('venta.create')
            ->with('success', 'Cliente guardado con éxito.');
    }


    public function edit($id)
    {
        $client = Cliente::find($id);
        $tclientes = Tipocliente::orderBy('nombre', 'DESC')->pluck('nombre', 'id');
        $nacionalidad = Nacionalidad::orderBy('nombre', 'DESC')->pluck('nombre', 'id');

        return view('cliente.edit', compact('client', $client->id,'tclientes','nacionalidad'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteUpdateRequest $request, $id)
    {
        $clientes = Cliente::find($id);

        $clientes->fill($request->all())->save();

        return redirect()->route('cliente.index')
            ->with('success', 'Cliente actualizado con éxito');
    }

}
