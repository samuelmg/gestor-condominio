<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Vivienda;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::with('viviendas:id,numero')->get();
        return view('personas.personaIndex', compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viviendas = Vivienda::all()->sortBy('numero');
        return view('personas.personaForm', compact('viviendas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:3|max:255',
            'tel_celular' => 'required|unique:personas|string|size:10',
            'tipo' => 'required|string|max:20',
            'vivienda_id' => 'required|integer',
        ]);

        $persona = new Persona();
        $persona->condominio_id = session('condominio_id');
        $persona->nombre = $request->nombre;
        $persona->tel_celular = $request->tel_celular;
        $persona->tel_fijo = $request->tel_fijo;
        $persona->save();

        $persona->viviendas()->attach($request->vivienda_id, ['tipo' => $request->tipo]);

        return redirect()->route('vecinos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        $viviendas = Vivienda::all()->sortBy('numero');
        return view('personas.personaForm', compact('viviendas', 'persona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        $request->validate([
            'nombre' => 'required|min:3|max:255',
            'tel_celular' => [
                                'required',
                                Rule::unique('personas')->ignore($persona->id),
                                'string',
                                'size:10',
                            ],
            'tipo' => 'required|string|max:20',
            'vivienda_id' => 'required|integer',
        ]);

        $persona->condominio_id = session('condominio_id');
        $persona->nombre = $request->nombre;
        $persona->tel_celular = $request->tel_celular;
        $persona->tel_fijo = $request->tel_fijo;
        $persona->save();

        $persona->viviendas()->sync([$request->vivienda_id => ['tipo' => $request->tipo]]);

        return redirect()->route('vecinos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        //
    }
}
