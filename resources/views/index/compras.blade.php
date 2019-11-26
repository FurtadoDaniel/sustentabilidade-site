@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form method="GET" action="{{  route('novo_produto')  }}">
                    <button type="submit" class="btn btn-lg btn-success">
                        {{ __('Vender') }}
                    </button>
                </form>
                <br />
                <div class="card-deck">
                    @foreach($produtos as $produto)
                        <div class="card">
                            @if($produto->hasMedia('foto'))
                                <img src="{{ $produto->firstMedia('foto')->getUrl() }}" height="200" class="card-image-top">
                            @else
                                <img src="https://via.placeholder.com/300x200?text=imagem" height="200" class="card-image-top">
                            @endif
                            <div class="card-body">
                                <h3 class="card-title">{{ $produto->nome }}</h3>
                                        <h4> Descrição </h4>
                                        <p> {{ $produto->descricao }} </p>
                                        <h5> R$ {{ $produto->preco }}</h4>
                                </div>
                            <div class="card-footer">

                                    <form method="POST" action="{{ route('add_car') }}">
                                        @csrf
                                        <div class="form-inline">
                                            <input id="qtd" type="text" class="form-control mr-sm-2 col-md-3" name="qtd" value="{{ 1 }}" >
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Comprar') }}
                                            </button>
                                            
                                        </div>
                                    </form>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection


