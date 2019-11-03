@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="GET" action="{{  route('novo_produto')  }}">
                    <button type="submit" class="btn btn-success">
                        {{ __('Vender') }}
                    </button>
                </form>
                @foreach($produtos as $produto)
                    <div class="card">
                        <div  class="card-header">{{$produto->nome}}</div>
                        <div class="card-body">
                            <div class="col-md-6">
                                <h4> Descrição </h4>
                                <p> {{ $produto->descricao }} </p>
                                <img src="{{ asset("produtos/{$produto->foto}") }}">
                                <h4> Tamanho </h4>
                                <p> {{ $produto->tamanho }} </p>
                                <h4> Cor </h4>
                                <p> {{ $produto->cor }} </p>
                                <h4> Valor (R$)</h4>
                                <p> {{ $produto->preco }} </p>
                            </div>
                        </div>
                        <div class="card-body">

                                <form method="POST" action="{{ route('add_car') }}">
                                    @csrf
                                    <div class="form-group row">
                                    <input id="id" type="text" class="form-control " name="id" value="{{ $produto->id }}" style="display: none">
                                    <label for="valor" class="col-md-4 col-form-label text-md-right">{{ __('Quantidade') }}</label>
                                        <div class="col-md-6">
                                    <input id="qtd" type="text" class="form-control" name="qtd" value="{{ 1 }}" >
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Comprar') }}
                                    </button>
                                        </div>
                                    </div>
                                </form>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection


