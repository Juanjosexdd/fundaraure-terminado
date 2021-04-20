<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cuentapote;
use App\Formapago;
use App\Venta;
use App\User;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $ventasmes=DB::select('SELECT monthname(v.fecha_venta) as mes, sum(v.total) as totalmes from ventas v where v.estado="Registrado" group by monthname(v.fecha_venta) order by month(v.fecha_venta) desc limit 12');

        // $ventasdia=DB::select('SELECT DATE_FORMAT(v.fecha_venta,"%d/%m/%Y") as dia, sum(v.total) as totaldia from ventas v where v.estado="Registrado" group by v.fecha_venta order by day(v.fecha_venta) desc limit 15');

        // $productosvendidos=DB::select('SELECT p.nombre as producto, sum(dv.cantidad) as cantidad from productos p inner join detalle_ventas dv on p.id=dv.idproducto inner join ventas v on dv.idventa=v.id where v.estado="Registrado" and year(v.fecha_venta)=year(curdate()) group by p.nombre order by sum(dv.cantidad) desc limit 10');

        $total=DB::select('SELECT (select ifnull(sum(v.total),0) from ventas v where DATE(v.fecha_venta)=curdate() and v.estado="Procesado") as totalventa');

        $ventasmes=DB::select('SELECT monthname(v.fecha_venta) as mes, sum(v.total) as totalmes from ventas v where v.estado="Procesado" group by monthname(v.fecha_venta) order by monthname(v.fecha_venta) desc limit 12');

        $cuenta = Cuentapote::join('movingresoegresos','cuentapotes.id','=','movingresoegresos.codctapote')
         ->select('cuentapotes.id',DB::raw('sum(movingresoegresos.monto) as total'))
         ->where('cuentapotes.id','=','1')
         ->orderBy('cuentapotes.id', 'desc')
         ->groupBy('cuentapotes.id')
         ->take(1)->get();

        $cuenta2 = Cuentapote::join('movingresoegresos','cuentapotes.id','=','movingresoegresos.codctapote')
         ->select('cuentapotes.id',DB::raw('sum(movingresoegresos.monto) as total2'))
         ->where('cuentapotes.id','=','2')
         ->orderBy('cuentapotes.id', 'desc')
         ->groupBy('cuentapotes.id')
         ->take(1)->get();

        $venta = Formapago::join('ventas','formapagos.id','=','ventas.codformapago')
         ->select('formapagos.id',DB::raw('sum(ventas.total) as totalfac'))
         ->where('ventas.estado','=','Procesado')
         ->groupBy('formapagos.id','ventas.estado')
         ->take(1)->get();

            return view('home',["ventasmes"=>$ventasmes,"total"=>$total,"venta"=>$venta,"cuenta2"=>$cuenta2,"cuenta"=>$cuenta]);

        }
}
