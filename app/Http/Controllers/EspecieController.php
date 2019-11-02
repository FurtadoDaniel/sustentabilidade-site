<?php

namespace App\Http\Controllers;

use App\Especie;
use Illuminate\Http\Request;

class EspecieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(?string $tipo = null)
    {
        return view('index.especies', [
            'especies' => Especie::when($tipo, function ($query, $tipo) {
                return $query->doTipo($tipo)->get();
            }, function ($query) {
                return $query->get();
            })
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $especie = new Especie($request->all());
        $especie->save();
        return $especie;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Especie  $especie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $especie = Especie::findOrFail($id);
        return view('Forms.vender',['titulo_doacao' => 'Adotar uma espécie',
                                          'tipo' => $especie->tipo,
                                          'id' => $especie->id,
                                          'item' => $especie->nome,
                                          'valor' => 0,
                                          'custo_modificavel' => true]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Especie  $especie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Especie $especie)
    {
        $especie->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Especie  $especie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Especie $especie)
    {
        //
    }
}
