<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddProductoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductoRequest;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Carbon;
use App\Producto;
use DB;


class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:producto.create')->only(['create', 'store']);
        $this->middleware('can:producto.index')->only(['index']);
        $this->middleware('can:producto.edit')->only(['edit', 'update']);
        $this->middleware('can:producto.show')->only(['show']);
        $this->middleware('can:producto.destroy')->only(['destroy']);
        $this->middleware('can:producto.pdf')->only(['pdf']);
    }
    public function exportPdf(Request $request){
        // $productos = Producto::all();

        $sql=trim($request->get('desde'));
        $sql2=trim($request->get('hasta'));


        $productos=DB::table('productos as p')
            ->select('p.id','p.nombre','p.precio_venta','p.condicion')
            ->where('p.created_at','LIKE','%'.$sql.'%')
            ->orwhere('p.created_at','LIKE','%'.$sql2.'%')
            ->orderBy('p.id','asc')
            ->paginate(10);

        $today = Carbon::now()->format('d/m/Y');

        $pdf = PDF::loadView('pdf.productos', compact('productos','today'));

        return $pdf->stream('listado-productos.pdf');
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
            $productos=DB::table('productos as p')
            ->select('p.id','p.nombre','p.precio_venta','p.condicion')
            ->where('p.nombre','LIKE','%'.$sql.'%')
            ->orwhere('p.id','LIKE','%'.$sql.'%')
            ->orderBy('p.id','desc')
            ->paginate(10);

            return view('producto.index',["productos"=>$productos, "buscarTexto"=>$sql]);

        }
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductoRequest $request)
    {
        //
        $producto= new Producto();
        $producto->nombre = $request->nombre;
        $producto->precio_venta = $request->precio_venta;
        $producto->condicion = '1';

        $producto->save();
        return Redirect::to("producto")->with('success', 'Servicio creado con éxito');
    }

    public function create()
    {
        return view('producto.create',[
            'producto' => new Producto
        ]);
    }

    public function edit($id)
    {
        $producto = Producto::find($id);
        return view('producto.edit', compact('producto'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoRequest $request, $id_producto)
    {
        //
        $producto = Producto::find($id_producto);

        $producto->fill($request->all())->save();
        return Redirect::to("producto")->with('success', 'Servicio actualizado con éxito');
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
            $producto= Producto::findOrFail($request->id_producto);

            if($producto->condicion=="1"){

                $producto->condicion= '0';
                $producto->save();
                return Redirect::to("producto")->with('success', 'Servicio actualizado con éxito.');

            } else{

                $producto->condicion= '1';
                $producto->save();
                return Redirect::to("producto")->with('success', 'Servicio actualizado con éxito.');;

            }
    }

       public function listarPdf(){


            $cont=Producto::count();

            $pdf= \PDF::loadView('pdf.productospdf',['productos'=>$productos,'cont'=>$cont]);
            return $pdf->download('productos.pdf');

    }
}
