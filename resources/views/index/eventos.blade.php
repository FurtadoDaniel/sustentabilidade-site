@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">

                <form method="GET" action="{{  route('novoEvento')  }}">
                <button type="submit" class="btn btn-success">
                    {{ __('Novo') }}
                </button>
                </form>
                <div class="card">
                    <div class="card-header">{{ __('Pesqusiar') }}</div>

                    <div class="card-body">
                        <form method="GET" action="{{ route('eventos.pesquisar') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="tipo_acao" class="col-md-4 col-form-label text-md-right">{{ __('Tipo Ação') }}</label>
                                <div class="col-md-6">
                                    <select id="tipo_acao" type="text" class="form-control " name="tipo_acao" >
                                        <option value="">Qualquer</option>
                                        @foreach(\App\Enums\TipoEventoEnum::values() as $tipo)
                                        <option value="{{ $tipo }}">{{ ucfirst($tipo) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cidade" class="col-md-4 col-form-label text-md-right">{{ __('Cidade') }}</label>
                                <div class="col-md-6">
                                    <input id="cidade" type="text" class="form-control " name="cidade" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="data" class="col-md-4 col-form-label text-md-right">{{ __('data') }}</label>
                                <div class="col-md-6">
                                    <input id="data" type="date" class="form-control " name="data">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Pesqusiar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                @foreach($eventos as $evento)
                    <div class="card">
                        <div class="card-header">{{ $evento->titulo }}</div>
                        <div class="card-body">
                            <div class="col-md-6">
                                <h4> Data Início</h4>
                                <p> {{ $evento->inicio }} </p>
                            </div>
                            <div class="col-md-6">
                                <h4> Data Fim</h4>
                                <p> {{ $evento->fim }} </p>
                            </div>
                            <div class="col-md-6">
                                <h4> Local </h4>
                                <p> {{ $evento->local }} </p>
                            </div>
                            <div class="col-md-6">
                                <h4> </h4>
                                <p> {{ $evento->descricao }} </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection


