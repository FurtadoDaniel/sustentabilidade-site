<?php

namespace App\Http\Controllers;

use App\Evento;
use App\Http\Resources\EventoResource;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pesquisar(Request $request)
    {
        $eventos = Evento::all();
        $cidade =$request->input('cidade');
        $data = strtotime ($request->input('data'));
        $tipo_acao = $request->input('tipo_acao');

        $eventos_array = array_filter($eventos->all(), function($obj) use ($cidade){
            if (isset($obj->local)) {
                if (strpos($obj->local, $cidade) === false ) return false;
            }
            return true;
        });

        $eventos_array = array_filter($eventos_array, function($obj) use ($data){
            if ($data > $obj->inicio and $data < $obj->fim) return false;
            return true;
        });

        $eventos_array = array_filter($eventos_array, function($obj) use ($tipo_acao){
            if (isset($obj->tipo)) {
                if (strpos($obj->tipo, $tipo_acao) === false ) return false;
            }
            return true;
        });

        return view('index.eventos',['eventos' => $eventos_array]);
    }

    public function index()
    {
        return view('index.eventos',['eventos' => Evento::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $evento = new Evento($request->all());
        $evento->save();
        return $evento;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        return $evento;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        $evento->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        //
    }
}
