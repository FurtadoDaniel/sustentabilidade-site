<?php

namespace App\Http\Controllers;

use App\Especie;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
    public function show(Especie $especie)
    {
        return view('Forms.adocao', ['especie' => $especie]);
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
        $request->validate([
            'cartao'    =>  'bail|required|size:16|regex:/[0-9]/',
            'csv'       =>  'bail|required|size:3|regex:/[0-9]/',
            'validade'  =>  'bail|required|date|after:' . Carbon::now()->year
        ]);
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
