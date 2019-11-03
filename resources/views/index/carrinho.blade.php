@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="GET" action="{{  url('/produtos')  }}">
                    <button type="submit" class="btn btn-success">
                        {{ __('Continuar comprando') }}
                    </button>
                </form>
                <form method="delete" action="{{  url('/carrinho')  }}">
                    <button type="submit" class="btn btn-danger">
                        {{ __('Limpar carrinho') }}
                    </button>
                </form>

                    <div class="card">
                        <div  class="card-header">Carrinho</div>

                        <div class="card-body">
                            @foreach($carrinho as $item)
                            <div class="col-md-6">
                                <p>{{ $item['qtd'] }}x {{ $item['produto'] }} Valor R$:{{ $item['valor'] }}</p>
                            </div>
                            @endforeach
                        </div>

                    </div>

                <form method="GET" action="{{ route('Sucesso') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="item" class="col-md-4 col-form-label text-md-right">Total</label>
                        <div class="col-md-6">
                                <input id="item" type="text" class="form-control" name="item" value="{{ $total }}" readonly>
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
@endsection


