<?php

namespace App\Http\Controllers;

use App\AbaixoAssinado;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AbaixoAssinadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index.assinados',['abaixos' => AbaixoAssinado::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.abaixo_assinado');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $assinado = new AbaixoAssinado;
        $assinado->titulo = $request->titulo;
        $assinado->fim = $request->fim;
        $assinado->meta = $request->meta;
        $assinado->descricao = $request->descricao;
        $assinado->user_id = Auth::id();
        $assinado->save();
        return redirect('/abaixo-assinados');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AbaixoAssinado  $abaixoAssinado
     * @return \Illuminate\Http\Response
     */
    public function show(AbaixoAssinado $abaixoAssinado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AbaixoAssinado  $abaixoAssinado
     * @return \Illuminate\Http\Response
     */
    public function edit(AbaixoAssinado $abaixoAssinado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AbaixoAssinado  $abaixoAssinado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AbaixoAssinado $abaixoAssinado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AbaixoAssinado  $abaixoAssinado
     * @return \Illuminate\Http\Response
     */
    public function destroy(AbaixoAssinado $abaixoAssinado)
    {
        //
    }
}
