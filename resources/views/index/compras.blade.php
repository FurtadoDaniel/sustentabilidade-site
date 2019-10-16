@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($produtos as #produto)
                    <div class="card">
                        <div  class="card-header">{{$produto->nome}}</div>
                        <div class="card-body">
                            <div class="col-md-6">
                                <h4> Descrição </h4>
                                <p> {{ $produto->info }} </p>
                                <img src="{{ public_path($produto->src) }}">
                                <h4> Tamanho </h4>
                                <p> {{ $produto->tamanho }} </p>
                                <h4> Valor </h4>
                                <p> {{ $produto->valor }} </p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-6">
                                <form method="POST" action="{{ route('comprar') }}">
                                    <input id="id" type="text" class="form-control " name="id" value="{{ $produto->id }}" style="display: none">
                                    <label for="valor" class="col-md-4 col-form-label text-md-right">{{ __('Quantidade') }}</label>
                                    <input id="qtd" type="text" class="form-control" name="qtd" value="{{ 1 }}" >
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Comprar') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection


