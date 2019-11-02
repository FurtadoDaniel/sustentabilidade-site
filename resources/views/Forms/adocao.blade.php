@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Adotar {{ $especie->tipo }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('especie.update') }}">
                            @csrf
                            @method('patch')

                            <div class="form-group row">
                                <label for="valor" class="col-md-4 col-form-label text-md-right">{{ Auth::user()->name . __(' quanto deseja doar?') }}</label>
                                <div class="col-md-6">
                                        <input id="valor" type="number" min="0.00" step="0.01" class="form-control" name="valor" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cartao" class="col-md-4 col-form-label text-md-right">{{ __('Cartão') }}</label>
                                <div class="col-md-6">
                                    <input id="cartao" type="text" class="form-control @error('cartao') inválido @enderror" name="cartao"  >
                                    @error('cartao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ "Cartão Inválido" }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cartao_validade" class="col-md-4 col-form-label text-md-right">{{ __('Validade') }}</label>
                                <div class="col-md-6">
                                    <input id="cartao_validade" type="date" class="form-control @error('validade') inválida @enderror" name="cartao_validade" placeholder="MM/YY"  >
                                    @error('validade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ "Validade Inválida" }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="codigo" class="col-md-4 col-form-label text-md-right">{{ __('CSV') }}</label>
                                <div class="col-md-6">
                                    <input id="codigo" type="text" class="form-control @error('codigo') inválido @enderror" name="codigo"  >
                                    @error('codigo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ "Código Inválido" }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Confirmar Pagamento') }}
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
