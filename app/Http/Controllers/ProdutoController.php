<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProdutoResource;
use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index.compras',['produtos' => Produto::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hash = md5(uniqid(rand(),true));
        if($request->hasFile('file')){

            $file = $request->file->storeAs('produtos',$hash.'.jpg');
            if($file){
                $produto = new Produto();
                $produto->nome = $request->nome;
                $produto->preco = $request->preco;
                $produto->descricao = $request->descricao;
                $produto->foto = $hash.'.jpg';
                $produto->tamanho = $request->tamanho;
                $produto->cor = $request->cor;
                $produto->user_id = Auth::id();
                $produto->save();

            }
        }

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return new ProdutoResource($produto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        //
    }
}
