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
        $cidade = '%' . $request->cidade . '%' ?? null;
        $data = $request->data ?? null;
        $tipo_acao = $request->tipo_acao ?? null;

        $resultado = Evento::when($tipo_acao, function ($query, $tipo_acao) {
            return $query->where('tipo', 'like', $tipo_acao);
        })->when($data, function ($query, $data) {
            return $query->where('inicio', '=', $data)
                ->orWhere->where(function ($query) use ($data) {
                    return $query->where('fim', '>=', $data);
                });
        })->when($cidade, function ($query, $cidade) {
            return $query->where('local', 'like', $cidade);
        })->get();

        return view('index.eventos', ['eventos' => $resultado]);
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
