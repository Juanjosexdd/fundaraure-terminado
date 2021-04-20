<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovingresoegresoRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Movingresoegreso;
use App\Conceptoingreso;
use App\Cuentapote;
use App\Formapago;
use App\Concepto;
use App\Venta;
use DB;

class MovingresoegresoController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:megresos.index')->only(['index']);
        $this->middleware('can:megresos.show')->only(['show']);
        $this->middleware('can:megresos.create')->only(['create', 'store']);
    }
    public function exportPdf(Request $request){

        if($request){
            $sql=trim($request->get('desde'));
            $sql1=trim($request->get('hasta'));
            $sql2=trim($request->get('cuentapote'));
            $sql3=trim($request->get('codconcepto'));

            $megresos=Movingresoegreso::join('conceptos','movingresoegresos.codconcepto','=','conceptos.id')
                ->join('cuentapotes','movingresoegresos.codctapote','=','cuentapotes.id')
                ->join('users','movingresoegresos.idusuario','=','users.id')
                ->select('movingresoegresos.id','movingresoegresos.monto','movingresoegresos.observacion','conceptos.nombre as concepto','cuentapotes.nombre as cuenta','movingresoegresos.created_at','users.usuario as usuario')
                ->where('movingresoegresos.created_at','LIKE','%'.$sql.'%')
                ->orWhere('movingresoegresos.created_at','LIKE','%'.$sql1.'%')
                ->orWhere('movingresoegresos.codctapote','LIKE','%'.$sql2.'%')
                ->orWhere('movingresoegresos.codconcepto','LIKE','%'.$sql3.'%')
                ->orderBy('id','asc')->get();

            $today = Carbon::now()->format('d/m/Y');
            $pdf = PDF::loadView('pdf.megresos', compact('megresos','today'));

            return $pdf->stream('listado-megresos.pdf');
        }
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
            $megresos=Movingresoegreso::join('conceptos','movingresoegresos.codconcepto','=','conceptos.id')
            ->join('cuentapotes','movingresoegresos.codctapote','=','cuentapotes.id')
            ->join('users','movingresoegresos.idusuario','=','users.id')
            ->select('movingresoegresos.id','movingresoegresos.monto','movingresoegresos.observacion','conceptos.nombre as concepto','cuentapotes.nombre as cuenta','users.usuario as usuario','movingresoegresos.created_at')
            ->where('movingresoegresos.id','LIKE','%'.$sql.'%')
            ->orderBy('movingresoegresos.id','desc')
            ->paginate(10);

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

            return view('megresos.index',["venta"=>$venta,"cuenta2"=>$cuenta2,"cuenta"=>$cuenta,"megresos"=>$megresos,"buscarTexto"=>$sql]);
            //return $ventas;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conceptos = Concepto::orderBy('nombre', 'DESC')->pluck('nombre', 'id');
        $cpotes = Cuentapote::orderBy('nombre', 'DESC')->pluck('nombre', 'id');

        return view('megresos.create', compact('cpotes','conceptos'),[
            'megresos' => new Movingresoegreso
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovingresoegresoRequest $request)
    {
        $megresos= new Movingresoegreso();
        // $megresos->idusuario = \Auth::user()->id;
        $megresos->idusuario = \Auth::user()->id;
        $megresos->codconcepto = $request->codconcepto;
        $megresos->codctapote = $request->codctapote;
        $megresos->monto = $request->monto;
        $megresos->observacion = $request->observacion;

        $megresos->save();
        return redirect()->route('megresos.index')
            ->with('success', 'Movimiento guardado con éxito.');
    }

}
