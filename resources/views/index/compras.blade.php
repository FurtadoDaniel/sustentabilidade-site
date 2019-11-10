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
                        <img src="{{ $produto->firstMedia('foto')->getUrl() }}" class="card-image-top">
                        <div class="card-body">
                        <h2 class="card-title col-md-6">{{ $produto->nome }}</h2>
                            <div class="col-md-6">
                                <h4> Descrição </h4>
                                <p> {{ $produto->descricao }} </p>
                                <h5> R$ {{ $produto->preco }}</h4>
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


