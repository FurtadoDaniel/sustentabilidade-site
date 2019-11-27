@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <h4 class="alert-heading">{{ session('success.titulo') }}</h4>
                        <hr />
                        <p>{{ session('success.corpo') }}</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card-deck">
                    @foreach($especies as $especie)
                        <div class="card">
                            @if($especie->hasMedia('foto'))
                                <img src="{{ $especie->firstMedia('foto')->getUrl() }}" height="200" class="card-image-top">
                            @else
                                <img src="https://via.placeholder.com/300x200?text=imagem" height="200" class="card-image-top">
                            @endif
                            <div class="card-body">
                                <h3 class="card-title col-md-auto">
                                    {{ $especie->nome }}<small class="text-muted"><em> ({{ $especie->nome_cientifico }})</em></small>
                                </h3>
                                <div class="col-md-auto">
                                    <h5> Descrição </h5>
                                    <p> {{ Str::limit($especie->descricao, 140, '[...]') }} </p>
                                    @if(isset($especie->produto))
                                        <h4> Kit </h4>
                                        <p> {{ $especie->produto->nome }} </p>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('especies.show', $especie) }}" class="btn btn-outline-primary">Detalhes</a>
                                <a href="{{ route('adotar', $especie) }}" class="btn btn-success">Adotar</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection


