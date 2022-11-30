<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreViviendaRequest;
use App\Http\Requests\UpdateViviendaRequest;
use App\Models\Vivienda;

class ViviendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viviendas = Vivienda::all();
        return view('viviendas.viviendaIndex', compact('viviendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreViviendaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreViviendaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vivienda  $vivienda
     * @return \Illuminate\Http\Response
     */
    public function show(Vivienda $vivienda)
    {
        return view('viviendas.viviendaShow', compact('vivienda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vivienda  $vivienda
     * @return \Illuminate\Http\Response
     */
    public function edit(Vivienda $vivienda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateViviendaRequest  $request
     * @param  \App\Models\Vivienda  $vivienda
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateViviendaRequest $request, Vivienda $vivienda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vivienda  $vivienda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vivienda $vivienda)
    {
        //
    }
}
