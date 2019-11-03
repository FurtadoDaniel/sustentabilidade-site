@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Produto') }}</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ url('/produtos') }}">
                        @csrf
                        <div class="form-group row" >
                            <div class="col-md-6">
                                <input id="user_id" type="text" class="form-control " name="user_id" value="{{Auth::id()}}" style="display: none">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control " name="nome" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="preco" class="col-md-4 col-form-label text-md-right">{{ __('Preço (R$)') }}</label>
                            <div class="col-md-6">
                                <input id="preco" type="number"  min="0.00" step="0.01"  class="form-control " name="preco" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }}</label>
                            <div class="col-md-6">
                                <input id="descricao" type="text" class="form-control " name="descricao">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tamanho" class="col-md-4 col-form-label text-md-right">{{ __('Tamanho') }}</label>
                            <div class="col-md-6">
                                <input id="tamanho" type="text" class="form-control " name="tamanho">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cor" class="col-md-4 col-form-label text-md-right">{{ __('Cor') }}</label>
                            <div class="col-md-6">
                                <input id="cor" type="text" class="form-control " name="cor" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('Imagem') }}</label>
                            <div class="col-md-6">
                                <input id="file" type="file" class="form-control " name="file" >
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
