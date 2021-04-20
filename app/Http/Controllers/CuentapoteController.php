<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CpoteRequest;
use App\Cuentapote;
use App\Movingresoegreso;
use Barryvdh\DomPDF\Facade as PDF;

use DB;

class CuentapoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:cpotes.index')->only(['index']);
    }

    public function exportPdf(){
        $cpotes = Cuentapote::all();
        $pdf = PDF::loadView('pdf.cpotes', compact('cpotes'));

        return $pdf->stream('listado-cpotes.pdf');
    }
    //
    public function index(Request $request)
    {
        if($request){

            $sql=trim($request->get('buscarTexto'));
            $cpotes=DB::table('cuentapotes as c')
            ->select('c.id','c.nombre','c.codcuenta','c.estatus')
            ->where('c.nombre','LIKE','%'.$sql.'%')
            ->orwhere('c.codcuenta','LIKE','%'.$sql.'%')
            ->orderBy('c.id','desc')
            ->paginate(5);

            $cuenta = Cuentapote::join('movingresoegresos','cuentapotes.id','=','movingresoegresos.codctapote')
             ->select('cuentapotes.id',DB::raw('sum(movingresoegresos.monto) as total'))
             ->where('cuentapotes.id','=','1')
             ->orderBy('cuentapotes.id', 'desc')
             ->groupBy('cuentapotes.id')
             ->take(1)->get();

            return view('cpotes.index',["cpotes"=>$cpotes,"cuenta"=>$cuenta, "buscarTexto"=>$sql]);

        }
    }


    public function listarPdf(){
            $cont=Cuentapote::count();

            $pdf= \PDF::loadView('pdf.cpotesspdf',['cpotess'=>$cpotess,'cont'=>$cont]);
            return $pdf->download('cpotess.pdf');

    }
}
