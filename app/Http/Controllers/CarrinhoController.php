<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class CarrinhoController extends Controller
{
    public function index(Request $request)
    {
        $carrinho = $request->session()->get('carrinho');

        $total = 0;
        foreach ($carrinho as $entrada){
            $total = $total + $entrada['valor'];
        }
        return view('index.carrinho',['carrinho' => $carrinho,'total'=>$total]);
    }

    public function store(Request $request)
    {

        $product_id = $request->get('id');
        $qtd = $request->get('qtd');
        $produto = Produto::find($product_id);
        $produto_nome = $produto->nome;
        $valor = $produto->preco * $qtd;

        $request->session()->push('carrinho', ['id' => $product_id, 'produto' => $produto_nome,'qtd' =>  $qtd,'valor' =>  $valor]);
        return redirect('/carrinho');
    }

    public function limpar(Request $request)
    {
        $request->session()->flush();
        return redirect('/produtos');
    }

}
