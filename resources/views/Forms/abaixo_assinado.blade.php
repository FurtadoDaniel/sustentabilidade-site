@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Evento') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('abaixo-assinados.store') }}">
                        @csrf

                        <div class="form-group row" >

                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control " name="id" value="{{ $id }}" style="display: none">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Evento') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control " name="name" value="{{ $nome }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tipo_acao" class="col-md-4 col-form-label text-md-right">{{ __('Tipo Ação') }}</label>
                            <div class="col-md-6">
                                <select id="tipo_acao" type="text" class="form-control " name="tipo_acao" value="{{ $tipo_acao }}">
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
                                <input id="cidade" type="text" class="form-control " name="cidade" value="{{ $cidade }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="data" class="col-md-4 col-form-label text-md-right">{{ __('data') }}</label>
                            <div class="col-md-6">
                                <input id="data" type="date" class="form-control " name="data" value="{{ $data }}">
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
