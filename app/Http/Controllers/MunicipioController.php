<?php

namespace App\Http\Controllers;

use App\Municipio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MunicipioRequest;

use App\Pais;
use App\Estado;


class MunicipioController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:municipio.create')->only(['create', 'store']);
        $this->middleware('can:municipio.index')->only(['index']);
        $this->middleware('can:municipio.edit')->only(['edit', 'update']);
        $this->middleware('can:municipio.show')->only(['show']);
        $this->middleware('can:municipio.destroy')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('municipio.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pais = Pais::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $estado = Estado::orderBy('nombre', 'ASC')->pluck('nombre', 'id');

        return view('municipio.create', compact('estado','pais'),[
            'municipio' => new Municipio

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MunicipioRequest $request)
    {
        $municipio = Municipio::create($request->all());

        return redirect()->route('municipio.index')
            ->with('success', 'Municipio guardado con éxito.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estado = Estado::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $municipio = Municipio::find($id);

        return view('municipio.edit', compact('municipio','estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function update(MunicipioRequest $request, $id)
    {
        $municipio = Municipio::find($id);

        $municipio->fill($request->all())->save();

        return redirect()->route('municipio.index')
            ->with('success', 'Municipio actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Municipio  $municipio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $municipio = Municipio::find($id)->delete();
        return back()->with('success', 'Municipio eliminado con exito');
    }
}
