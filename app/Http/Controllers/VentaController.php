<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\VentaRequest;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Movingresoegreso;
use App\DetalleVenta;
use App\Nacionalidad;
use App\Correlativo;
use App\Tipocliente;
use App\Formapago;
use App\Producto;
use App\Cliente;
use App\Empresa;
use App\Venta;
use DB;


class VentaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:venta.create')->only(['create', 'store']);
        $this->middleware('can:venta.index')->only(['index']);
        $this->middleware('can:venta.edit')->only(['edit', 'update']);
        $this->middleware('can:venta.show')->only(['show']);
        $this->middleware('can:venta.destroy')->only(['destroy']);
        $this->middleware('can:venta.pdf')->only(['pdf']);
    }

    public function exportPdf(Request $request){

        if($request){
            $sql=trim($request->get('desde'));
            $sql1=trim($request->get('hasta'));
            $sql2=trim($request->get('idusuario'));
            $sql3=trim($request->get('idcliente'));

            $ventas=Venta::join('clientes','ventas.idcliente','=','clientes.id')
                ->join('users','ventas.idusuario','=','users.id')
                ->join('formapagos','ventas.codformapago','=','formapagos.id')
                ->join('detalle_ventas','ventas.id','=','detalle_ventas.idventa')
                 ->select('ventas.id',
                 'ventas.num_venta','ventas.fecha_venta','ventas.impuesto','ventas.created_at',
                 'ventas.estado','ventas.total','clientes.nombres as cliente','clientes.apellidos as acliente','users.nombre','formapagos.nombre as formapagoss')
                ->where('ventas.created_at','LIKE','%'.$sql.'%')
                ->orWhere('ventas.created_at','LIKE','%'.$sql1.'%')
                ->orWhere('ventas.idusuario','LIKE','%'.$sql2.'%')
                ->orWhere('ventas.idcliente','LIKE','%'.$sql3.'%')
                ->get();
            $today = Carbon::now()->format('d/m/Y');
            $pdf = PDF::loadView('pdf.ventas', compact('ventas','today'))->setPaper('a4', 'landscape');
            return $pdf->stream('listado-ventas.pdf');
        }
    }


    public function index(Request $request){

        if($request){

            $sql=trim($request->get('buscarTexto'));
            $ventas=Venta::join('clientes','ventas.idcliente','=','clientes.id')
            ->join('users','ventas.idusuario','=','users.id')
            ->join('formapagos','ventas.codformapago','=','formapagos.id')
            ->join('detalle_ventas','ventas.id','=','detalle_ventas.idventa')
             ->select('ventas.id',
             'ventas.num_venta','ventas.fecha_venta','ventas.impuesto','ventas.created_at',
             'ventas.estado','ventas.total','clientes.nombres as cliente','clientes.apellidos as acliente','users.nombre','formapagos.nombre as formapagoss')
            ->where('ventas.num_venta','LIKE','%'.$sql.'%')
            ->orWhere('clientes.nombres','LIKE','%'.$sql.'%')
            ->orWhere('clientes.apellidos','LIKE','%'.$sql.'%')
            ->orWhere('users.usuario','LIKE','%'.$sql.'%')
            ->orWhere('formapagos.nombre','LIKE','%'.$sql.'%')
            ->orderBy('ventas.id','desc')
            ->groupBy('ventas.id',
            'ventas.num_venta','ventas.fecha_venta','ventas.impuesto','ventas.created_at',
            'ventas.estado','ventas.total','clientes.nombres','clientes.apellidos','users.nombre')
            ->paginate(10);

            return view('venta.index',["ventas"=>$ventas,"buscarTexto"=>$sql]);
            //return $ventas;
        }


     }


        public function create(){
             /*listar las clientes en ventana modal*/
             $venta = Venta::join('clientes','ventas.idcliente','=','clientes.id')
             ->join('formapagos','ventas.codformapago','=','formapagos.id')
             ->join('detalle_ventas','ventas.id','=','detalle_ventas.idventa')
             ->select('ventas.id',
             'ventas.num_venta','ventas.fecha_venta','ventas.impuesto',
             'ventas.estado','clientes.nombres','clientes.apellidos','clientes.cedula',
             DB::raw('sum(detalle_ventas.cantidad*precio - detalle_ventas.cantidad*precio*descuento/100) as total')
             )
             ->orderBy('ventas.id', 'desc')
             ->groupBy('ventas.id',
             'ventas.num_venta','ventas.fecha_venta','ventas.impuesto',
             'ventas.estado','clientes.nombres','clientes.apellidos','clientes.cedula')
             ->first();

             $clientes=DB::table('clientes')->get();
             $fpago=DB::table('formapagos')->get();
             // $fpago = Formapago::orderBy('nombre', 'ASC')->pluck('nombre', 'id');

             /*listar los productos en ventana modal*/
             $productos=DB::table('productos as prod')
             ->select(DB::raw('CONCAT(prod.nombre) AS producto'),'prod.id','prod.precio_venta')
             ->where('prod.condicion','=','1')
             ->groupBy('producto','prod.id','prod.precio_venta')
             ->get();

             $clientes=DB::table('clientes as cliente')
             ->select(DB::raw('CONCAT(cliente.cedula," ",cliente.nombres," ",cliente.apellidos) AS cliente'),'cliente.id','cliente.cedula')
             ->groupBy('cliente','cliente.id','cliente.cedula')
             ->get();


              /*listar las clientes en ventana modal*/
             $clientes=DB::table('clientes')->get();

             $tclientes = Tipocliente::orderBy('nombre', 'DESC')->pluck('nombre', 'id');
             $nacionalidad = Nacionalidad::orderBy('nombre', 'DESC')->pluck('nombre', 'id');

             return view('venta.create',["venta"=>$venta,"fpago"=>$fpago,"tclientes"=>$tclientes,"nacionalidad"=>$nacionalidad,"clientes"=>$clientes,"productos"=>$productos ]);

        }

        public function store(VentaRequest $request){


            try{

                DB::beginTransaction();
                $mytime= Carbon::now('America/Costa_Rica');

                $venta = new Venta();
                $venta->idcliente = $request->id_cliente;
                $venta->idusuario = \Auth::user()->id;
                $venta->num_venta = $request->num_venta;
                $venta->codformapago = $request->codformapago;
                $venta->fecha_venta = $mytime->toDateString();
                $venta->impuesto = "0.16";
                $venta->total=$request->total_pagar;
                $venta->estado = 'Procesado';
                $venta->save();

                $megresos= new Movingresoegreso();
                $megresos->idusuario = \Auth::user()->id;
                $megresos->codconcepto = "3";
                $megresos->codctapote = "1";
                $megresos->monto = $venta->total;
                $megresos->observacion = "INGRESO CORRESPONDIENTE A LA FACTURA NRO. $venta->num_venta ";
                $megresos->save();

                $id_producto=$request->id_producto;
                $cantidad=$request->cantidad;
                $descuento=$request->descuento;
                $precio=$request->precio_venta;


                //Recorro todos los elementos
                $cont=0;

                 while($cont < count($id_producto)){

                    $detalle = new DetalleVenta();
                    /*enviamos valores a las propiedades del objeto detalle*/
                    /*al idcompra del objeto detalle le envio el id del objeto venta, que es el objeto que se ingresó en la tabla ventas de la bd*/
                    /*el id es del registro de la venta*/
                    $detalle->idventa = $venta->id;
                    $detalle->idproducto = $id_producto[$cont];
                    $detalle->cantidad = $cantidad[$cont];
                    $detalle->precio = $precio[$cont];
                    $detalle->descuento = $descuento[$cont];
                    $detalle->save();
                    $cont=$cont+1;
                }

                DB::commit();

            } catch(Exception $e){

                DB::rollBack();
            }

            return Redirect::to('venta');
        }

         public function show($id){

             //dd($id);
             //dd($request->all());
             /*Datos empresa*/

             $empresa=DB::table('empresas as e')
            ->select('e.id','e.nombre','e.rif','e.descipcion','e.direccion');
             /*mostrar venta*/
             //$id = $request->id;
             $venta = Venta::join('clientes','ventas.idcliente','=','clientes.id')
             ->join('formapagos','ventas.codformapago','=','formapagos.id')
             ->join('detalle_ventas','ventas.id','=','detalle_ventas.idventa')
             ->select('ventas.id',
             'ventas.num_venta','ventas.fecha_venta','ventas.impuesto',
             'ventas.estado','clientes.nombres','clientes.apellidos','clientes.cedula','clientes.direccion',
                DB::raw('sum(detalle_ventas.cantidad*precio - detalle_ventas.cantidad*precio*descuento/100) as total')
             )
             ->where('ventas.id','=',$id)
             ->orderBy('ventas.id', 'desc')
             ->groupBy('ventas.id',
             'ventas.num_venta','ventas.fecha_venta','ventas.impuesto',
             'ventas.estado','clientes.nombres','clientes.apellidos','clientes.cedula','clientes.direccion')
             ->first();

             /*mostrar detalles*/
             $detalles = DetalleVenta::join('productos','detalle_ventas.idproducto','=','productos.id')
             ->select('detalle_ventas.cantidad','detalle_ventas.precio','detalle_ventas.descuento','productos.nombre as producto')
             ->where('detalle_ventas.idventa','=',$id)
             ->orderBy('detalle_ventas.id', 'desc')->get();

             return view('venta.show',['venta' => $venta,'detalles' =>$detalles,'empresa' =>$empresa]);
         }

         public function destroy(Request $request){

             $venta = Venta::findOrFail($request->id_venta);
             $venta->estado = 'Anulado';
             $venta->save();
             return Redirect::to('venta');

        }

        public function pdf(Request $request,$id){

             $venta = Venta::join('clientes','ventas.idcliente','=','clientes.id')
             ->join('users','ventas.idusuario','=','users.id')
             ->join('detalle_ventas','ventas.id','=','detalle_ventas.idventa')
             ->select('ventas.id',
             'ventas.num_venta','ventas.created_at','ventas.impuesto',
             'ventas.estado',DB::raw('sum(detalle_ventas.cantidad*precio - detalle_ventas.cantidad*precio*descuento/100) as total'),'clientes.nombres','clientes.apellidos','clientes.cedula',
             'clientes.direccion','clientes.email','clientes.telefono','users.usuario')
             ->where('ventas.id','=',$id)
             ->orderBy('ventas.id', 'desc')
             ->groupBy('ventas.id',
             'ventas.num_venta','ventas.created_at','ventas.impuesto',
             'ventas.estado','clientes.nombres','clientes.apellidos','clientes.cedula',
             'clientes.direccion','clientes.email','clientes.telefono','users.usuario')
             ->take(1)->get();

             $detalles = DetalleVenta::join('productos','detalle_ventas.idproducto','=','productos.id')
             ->select('detalle_ventas.cantidad','detalle_ventas.precio','detalle_ventas.descuento',
             'productos.nombre as producto')
             ->where('detalle_ventas.idventa','=',$id)
             ->orderBy('detalle_ventas.id', 'desc')->get();

             $numventa=Venta::select('num_venta')->where('id',$id)->get();
             $pdf= PDF::loadView('pdf.venta',['venta'=>$venta,'detalles'=>$detalles]);
             return $pdf->stream('venta-'.$numventa[0]->num_venta.'.pdf');
         }

}
