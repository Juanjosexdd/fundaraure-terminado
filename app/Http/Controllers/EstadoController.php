<?php

namespace App\Http\Controllers;

use App\Estado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EstadoRequest;
use App\Pais;


class EstadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:estado.create')->only(['create', 'store']);
        $this->middleware('can:estado.index')->only(['index']);
        $this->middleware('can:estado.edit')->only(['edit', 'update']);
        $this->middleware('can:estado.show')->only(['show']);
        $this->middleware('can:estado.destroy')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('estado.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pais = Pais::orderBy('nombre', 'ASC')->pluck('nombre', 'id');

        return view('estado.create', compact('pais'),[
            'estado' => new Estado

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstadoRequest $request)
    {
        $estado = Estado::create($request->all());

        return redirect()->route('estado.index')
            ->with('success', 'Estado guardado con éxito.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pais = Pais::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $estado = Estado::find($id);

        return view('estado.edit', compact('estado','pais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function update(EstadoRequest $request, $id)
    {
        $estado = Estado::find($id);

        $estado->fill($request->all())->save();

        return redirect()->route('estado.index')
            ->with('success', 'Estado actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estado = Estado::find($id)->delete();
        return back()->with('success', 'Estado eliminado con exito');
    }
}
