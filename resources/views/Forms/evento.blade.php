@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Evento') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/eventos') }}">
                        @csrf
                        <div class="form-group row" >

                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control " name="id"  style="display: none">
                            </div>
                        </div>
                        <div class="form-group row" >
                            <div class="col-md-6">
                                <input id="user_id" type="text" class="form-control " name="user_id" value="{{Auth::id()}}" style="display: none">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Título') }}</label>

                            <div class="col-md-6">
                                <input id="titulo" type="text" class="form-control " name="titulo" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tipo_acao" class="col-md-4 col-form-label text-md-right">{{ __('Tipo Ação') }}</label>
                            <div class="col-md-6">
                                <select id="tipo" type="text" class="form-control " name="tipo">
                                    <option value="passeata">Passeata</option>
                                    <option value="comunitaria">Atividade Comunitária</option>
                                    <option value="seminario">Seminário</option>
                                    <option value="workshop">Workshop</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cidade" class="col-md-4 col-form-label text-md-right">{{ __('Cidade') }}</label>
                            <div class="col-md-6">
                                <input id="local" type="text" class="form-control " name="local" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="data" class="col-md-4 col-form-label text-md-right">{{ __('Início') }}</label>
                            <div class="col-md-6">
                                <input id="inicio" type="date" class="form-control " name="inicio">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="data" class="col-md-4 col-form-label text-md-right">{{ __('Fim') }}</label>
                            <div class="col-md-6">
                                <input id="fim" type="date" class="form-control " name="fim">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cidade" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }}</label>
                            <div class="col-md-6">
                                <input id="local" type="text" class="form-control " name="local" >
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Cadastrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
