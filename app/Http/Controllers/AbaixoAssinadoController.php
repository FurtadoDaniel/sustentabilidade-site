<?php

namespace App\Http\Controllers;

use App\AbaixoAssinado;
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
        //
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
        (new AbaixoAssinado($request->all()))->save();
        return back();
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
