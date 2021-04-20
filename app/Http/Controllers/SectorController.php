<?php

namespace App\Http\Controllers;

use App\Sector;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SectorRequest;
use App\Parroquia;


class SectorController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:sector.create')->only(['create', 'store']);
        $this->middleware('can:sector.index')->only(['index']);
        $this->middleware('can:sector.edit')->only(['edit', 'update']);
        $this->middleware('can:sector.show')->only(['show']);
        $this->middleware('can:sector.destroy')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sector.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parroquia = Parroquia::orderBy('nombre', 'ASC')->pluck('nombre', 'id');

        return view('sector.create', compact('parroquia'),[
            'sector' => new Sector

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectorRequest $request)
    {
        $sector = Sector::create($request->all());

        return redirect()->route('sector.index')
            ->with('success', 'Sector guardado con éxito.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parroquia = Parroquia::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $sector = Sector::find($id);

        return view('sector.edit', compact('sector','parroquia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function update(SectorRequest $request, $id)
    {
        $sector = Sector::find($id);

        $sector->fill($request->all())->save();

        return redirect()->route('sector.index')
            ->with('success', 'Sector actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sector = Sector::find($id)->delete();
        return back()->with('success', 'Sector eliminado con exito');
    }
}
