<?php

namespace App\Http\Controllers;

use App\Pais;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaisRequest;


class PaisController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:pais.create')->only(['create', 'store']);
        $this->middleware('can:pais.index')->only(['index']);
        $this->middleware('can:pais.edit')->only(['edit', 'update']);
        $this->middleware('can:pais.show')->only(['show']);
        $this->middleware('can:pais.destroy')->only(['destroy']);
    }
    /**
     * Display a listing of the <resource class=""></resource>
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pais.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pais.create',[
            'pais' => new Pais
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaisRequest $request)
    {
        $pais = Pais::create($request->all());

        return redirect()->route('pais.index')
            ->with('success', 'Pais guardado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pais = Pais::find($id);

        return view('pais.show', compact('pais'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pais = Pais::find($id);

        return view('pais.edit', compact('pais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function update(PaisRequest $request, $id)
    {
        $pais = Pais::find($id);

        $pais->fill($request->all())->save();

        return redirect()->route('pais.index')
            ->with('success', 'Pais actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pais = Pais::find($id)->delete();
        return back()->with('success', 'Pais eliminado con exito');
    }
}
