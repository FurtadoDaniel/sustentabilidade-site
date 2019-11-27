@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form method="GET" action="{{  route('novoabaixo')  }}">
                    <button type="submit" class="btn btn-lg btn-success">
                        {{ __('Novo abaixo-assinado') }}
                    </button>
                </form>
                <br />
                <div class="card-deck">
                    @foreach($abaixos as $assinado)
                        <div class="card">
                            <div class="card-header">{{ $assinado->titulo }} </div>
                            <div class="card-body">
                                <div class="col-md-auto">
                                    <h4> Descrição </h4>
                                    <p> {{ $assinado->descricao }} </p>
                                </div>
                                <div class="col-md-auto">
                                    <h4> Meta </h4>
                                    <p> {{ $assinado->meta }} </p>
                                </div>
                                <div class="col-md-auto">
                                    <h4> Assinaturas </h4>
                                    <p> {{ count($assinado->assinaturas) }} </p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="form-group">
                                        <form method="POST" action="{{ url('/assinar')}}">
                                            @csrf
                                            <input id="abaixo_id" type="text" class="form-control " name="abaixo_id" value="{{ $assinado->id }}" style="display: none">
                                            <input id="user_id" type="text" class="form-control " name="user_id" value="{{ Auth::id() }}" style="display: none">
                                            <button type="submit" class="btn btn-block btn-primary">
                                                {{ __('Assinar') }}
                                            </button>
                                        </form>
                                    </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection


