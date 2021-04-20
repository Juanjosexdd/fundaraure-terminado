<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmpresaRequest;
use App\Http\Requests\EmpresaUpdateRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

use App\Empresa;
use DB;

class EmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:empresa.create')->only(['create', 'store']);
        $this->middleware('can:empresa.index')->only(['index']);
        $this->middleware('can:empresa.edit')->only(['edit', 'update']);
        $this->middleware('can:empresa.show')->only(['show']);
        $this->middleware('can:empresa.pdf')->only(['pdf']);
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::orderBy('id', 'DESC')->paginate(8);
        return view('empresa.index', compact('empresas'));
    }

    public function create()
    {
        return view('empresa.create',[
            'empresa' => new Empresa
        ]);
    }

    public function store(EmpresaRequest $request)
    {
        //
        $empresa = Empresa::create($request->all());
        //IMAGE
        if($request->file('file')){
            $path = Storage::disk('public')->put('image',  $request->file('file'));
            $empresa->fill(['file' => asset($path)])->save();
        }
        return Redirect::to("empresa")->with('success', 'Empresa guardado con éxito.');
    }

    public function edit($id)
    {
        $empresa = Empresa::find($id);

        return view('empresa.edit', compact('empresa'));
    }


    public function update(EmpresaRequest $request, $id)
    {
        //
        $empresa = Empresa::find($id);
        $empresa->fill($request->all())->save();
        //IMAGE
        if($request->file('file')){
            $path = Storage::disk('public')->put('image',  $request->file('file'));
            $empresa->fill(['file' => asset($path)])->save();
        }

        return Redirect::to("empresa")->with('success', 'Empresa actualizado con éxito.');
    }

    public function listarPdf(){


            $cont=Empresa::count();

            $pdf= \PDF::loadView('pdf.empresaspdf',['empresas'=>$empresas,'cont'=>$cont]);
            return $pdf->download('empresas.pdf');

    }
}
