@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                @foreach($especies as $especie)
                    <div class="card" style="width:">
                        <img src="{{ $especie->firstMedia('foto')->getUrl() }}" class="card-image-top">
                        <div class="card-body">
                            <h2 class="card-title col-md-6">{{ $especie->nome }}</h2>
                            <div class="col-md-6">
                                <h4> Info </h4>
                                <p> {{ $especie->descricao }} </p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-6">
                                <h4> Kit </h4>
                                <p> {{ $especie->kit }} </p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('especies.show', $especie) }}" class="btn btn-primary">Detalhes</a>
                            <a href="{{ route('adotar', $especie) }}" class="btn btn-outline-success">Adotar</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection


