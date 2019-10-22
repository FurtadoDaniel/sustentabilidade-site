@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Pesqusiar') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('/eventos') }}">
                            @csrf
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
                                        {{ __('Pesqusiar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-md-8">
                @foreach($eventos as #evento)
                    <div class="card">
                        <div class="card-header">{{$evento->nome}}</div>
                        <div class="card-body">
                            <div class="col-md-6">
                                <h4> Data </h4>
                                <p> {{ $evento->data }} </p>
                            </div>
                            <div class="col-md-6">
                                <h4> Local </h4>
                                <p> {{ $evento->local }} </p>
                            </div>
                            <div class="col-md-6">
                                <h4> </h4>
                                <p> {{ $evento->desc }} </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

