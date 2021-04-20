<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipocliente;
use App\Cuentapote;
use App\Concepto;
use App\Cliente;
use App\User;

class ReportsController extends Controller
{
    public function index()
    {
        $tclientes  = Tipocliente::orderBy('nombre', 'DESC')->pluck('nombre', 'id');
        $cuentapote = Cuentapote::orderBy('nombre', 'DESC')->pluck('nombre', 'id');
        $users      = User::orderBy('nombre', 'DESC')->pluck('nombre', 'id');
        $cliente    = Cliente::orderBy('nombres', 'DESC')->pluck('nombres', 'id');
        $conceptos = Concepto::orderBy('nombre', 'DESC')->pluck('nombre', 'id');

    	return view('reports.index', compact('conceptos','tclientes','cuentapote','users','cliente'));
    }
}
