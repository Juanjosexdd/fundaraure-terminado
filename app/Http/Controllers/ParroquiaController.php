<?php

namespace App\Http\Controllers;

use App\Parroquia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ParroquiaRequest;
use App\Municipio;


class ParroquiaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('parroquia.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipio = Municipio::orderBy('nombre', 'ASC')->pluck('nombre', 'id');

        return view('parroquia.create', compact('municipio'),[
            'parroquia' => new Parroquia

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParroquiaRequest $request)
    {
        $parroquia = Parroquia::create($request->all());

        return redirect()->route('parroquia.index')
            ->with('success', 'Parroquia guardado con éxito.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parroquia  $parroquia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $municipio = Municipio::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $parroquia = Parroquia::find($id);

        return view('parroquia.edit', compact('parroquia','municipio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parroquia  $parroquia
     * @return \Illuminate\Http\Response
     */
    public function update(ParroquiaRequest $request, $id)
    {
        $parroquia = Parroquia::find($id);

        $parroquia->fill($request->all())->save();

        return redirect()->route('parroquia.index')
            ->with('success', 'Parroquia actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parroquia  $parroquia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parroquia = Parroquia::find($id)->delete();
        return back()->with('success', 'Parroquia eliminado con exito');
    }
}
