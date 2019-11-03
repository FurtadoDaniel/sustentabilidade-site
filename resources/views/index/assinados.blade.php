@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="GET" action="{{  route('novoabaixo')  }}">
                    <button type="submit" class="btn btn-success">
                        {{ __('Novo') }}
                    </button>
                </form>
                @foreach($abaixos as $assinado)
                    <div class="card">
                        <div class="card-header">{{ $assinado->titulo }} </div>
                        <div class="card-body">
                            <div class="col-md-6">
                                <h4> Descrição </h4>
                                <p> {{ $assinado->descricao }} </p>
                            </div>
                            <div class="col-md-6">
                                <h4> Meta </h4>
                                <p> {{ $assinado->meta }} </p>
                            </div>
                            <div class="col-md-6">
                                <h4> Assinaturas </h4>
                                <p> {{ count($assinado->assinaturas) }} </p>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <form method="POST" action="{{ url('/assinar')}}">
                                        @csrf
                                        <input id="abaixo_id" type="text" class="form-control " name="abaixo_id" value="{{ $assinado->id }}" style="display: none">
                                        <input id="user_id" type="text" class="form-control " name="user_id" value="{{ Auth::id() }}" style="display: none">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Assinar') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection


