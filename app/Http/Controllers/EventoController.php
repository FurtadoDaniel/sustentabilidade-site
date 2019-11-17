<?php

namespace App\Http\Controllers;

use App\Evento;
use App\Mail\NovoEvento;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pesquisar(Request $request)
    {
        $cidade =$request->input('cidade');
        $data = strtotime ($request->input('data'));
        $tipo_acao = $request->input('tipo_acao');

        $eventos_array = Evento::all()->toArray();

        if(isset($cidade) and $cidade != ''){
            $eventos_array = array_filter($eventos_array, function($obj) use ($cidade){
                if (strpos($obj['local'], $cidade) === false ) return false;
                return true;
            });
        }

        if(isset($data) and $data != ''){
            $eventos_array = array_filter($eventos_array, function($obj) use ($data){
                if ($data >= strtotime($obj['inicio']) and $data <= strtotime($obj['fim'])) return false;
                return true;
            });
        }

        if(isset($tipo_acao) and $tipo_acao != ''){
            $eventos_array = array_filter($eventos_array, function($obj) use ($tipo_acao){
                    if (strpos($obj['tipo'], $tipo_acao) === false ) return false;
                return true;
            });
        }
        return view('index.eventos',['eventos' => $eventos_array]);
    }

    public function index()
    {
        $eventos = Evento::all();
        $cidades = $eventos->pluck('cidade');
        return view('index.eventos', [
            'eventos' => $eventos,
            'cidades' => $cidades
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
        $evento = new Evento($request->all());
        $evento->save();
        Mail::to(User::all())->send(new NovoEvento($evento));
        return view('index.eventos',['eventos' => Evento::all()]);
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
