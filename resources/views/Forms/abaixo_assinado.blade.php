@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Abaixo-assinado') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('abaixo-assinados.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="titulo" class="col-md-4 col-form-label text-md-right">{{ __('Título') }}</label>

                            <div class="col-md-6">
                                <input id="titulo" type="text" class="form-control" name="titulo" placeholder="Salvem os Abaixo-assinados!" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="fim" class="col-md-4 col-form-label text-md-right">{{ __('Data limite') }}</label>

                            <div class="col-md-6">
                                <input id="fim" type="date" min={{ today() }} class="form-control" name="fim" required>
                            </div>
                        </div>
                        
                        {{-- PARA DANIEL REVER --}}
                        <div class="form-group row">
                            <label for="meta" class="col-md-4 col-form-label text-md-right">{{ __('Meta de assinaturas') }}</label>

                            <div class="col-md-6">
                                <input id="meta" type="number" class="form-control" name="meta" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }}</label>

                            <div class="col-md-6">
                                <input id="descricao" type="textarea" class="form-control" name="descricao" aria-describedby="descHelpBox" required>
                                <small id="descHelpBox" class="form-text text-muted">Faça uma descrição do abaixo-assinado.</small>
                            </div>

                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
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
