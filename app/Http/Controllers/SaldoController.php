<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movingresoegreso;
use App\Cuentapote;
use App\Formapago;
use App\Venta;
use DB;


class SaldoController extends Controller
{
	public function __construct()
    {
        $this->middleware('can:saldo.index')->only(['index']);
    }


    public function index()
    {
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
        // $cuenta = Cuentapote::join('movingresoegresos','cuentapotes.id','=','movingresoegresos.codctapote')
        //  ->select('cuentapotes.id',DB::raw('sum(movingresoegresos.monto) as total'))
        //  ->where('cuentapotes.id','=','1')
        //  ->orderBy('cuentapotes.id', 'desc')
        //  ->groupBy('cuentapotes.id','codconcepto')
        //  ->take(1)->get();

        // $cuenta2 = Cuentapote::join('movingresoegresos','cuentapotes.id','=','movingresoegresos.codctapote')
        //  ->select('cuentapotes.id',DB::raw('sum(movingresoegresos.monto) as total2'))
        //  ->where('cuentapotes.id','=','2')
        //  ->orderBy('cuentapotes.id', 'desc')
        //  ->groupBy('cuentapotes.id')
        //  ->take(1)->get();

        // $venta = Formapago::join('ventas','formapagos.id','=','ventas.codformapago')
        //  ->select('formapagos.id',DB::raw('sum(ventas.total) as totalfac'))
        //  ->where('ventas.estado','=','Procesado')
        //  ->groupBy('formapagos.id','ventas.estado')
        //  ->take(1)->get();


        // $venta=Venta::select('ventas.id',DB::raw('sum(ventas.total) as totalfac'),'ventas.codformapago','ventas.estado')
        //      ->where('ventas.estado','=','Registrado')
        //      ->groupBy('ventas.id','ventas.codformapago','ventas.estado')
        //      ->take(1)->get();

        return view('saldo.index',["venta"=>$venta,"cuenta2"=>$cuenta2,"cuenta"=>$cuenta]);
        //return $ventas;
    }
}
