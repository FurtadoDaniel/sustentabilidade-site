<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class CarrinhoController extends Controller
{
    public function index(Request $request)
    {
        if (!session()->has('carrinho')) return redirect()->route('produtos.index');
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

    public function remover(Request $request, string $id)
    {
        $items = $request->session()->pull('carrinho',[]);
        foreach ($items as $item => $value){
            if($items[$item]['id'] == $id){
                unset($items[$item]);
            }
        }
        foreach ($items as $item ){
            $request->session()->push('carrinho', ['id' => $item['id'], 'produto' => $item['produto'],'qtd' =>  $item['qtd'],'valor' =>  $item['valor']]);
        }

        return redirect('/carrinho');
    }

    public function pagar(Request $request)
    {
        $carrinho = $request->session()->get('carrinho');
        $total = 0;
        foreach ($carrinho as $entrada){
            $total = $total + $entrada['valor'];
        }
        return view('Forms.pagamento')->with('total', $total);
    }

    public function comprar(Request $request)
    {
        $request->session()->pull('carrinho',[]);
        return redirect('/sucesso');
    }

}
