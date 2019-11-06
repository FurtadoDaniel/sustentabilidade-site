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

                    <div class="card">
                        <div  class="card-header">Carrinho</div>

                        <div class="card-body">
                            @foreach($carrinho as $item)
                            <div class="col-md-6">
                                <p>{{ $item['qtd'] }}x {{ $item['produto'] }} Valor R$:{{ $item['valor'] }}</p>

                                <form method="post" action="{{route('retirar_carrinho', $item['id'])}}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        {{ __('Remover') }}
                                    </button>
                                </form>
                            </div>
                            @endforeach
                        </div>

                    </div>

                <form method="POST" action="{{ route('comprar_carrinho') }}">
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
                            <select name="validade_mes" style="width:46px; padding-left:0px;"><option id="mes00"></option><option id="mes01" value="01">01</option><option id="mes02" value="02">02</option><option id="mes03" value="03">03</option><option id="mes04" value="04">04</option><option id="mes05" value="05">05</option><option id="mes06" value="06">06</option><option id="mes07" value="07">07</option><option id="mes08" value="08">08</option><option id="mes09" value="09">09</option><option id="mes10" value="10">10</option><option id="mes11" value="11">11</option><option id="mes12" value="12">12</option></select>
                            <font size="2" face="Verdana">/</font>
                            <select name="validade_ano" style="width:62px; padding-left:0px;"><option id="ano0000"></option><option id="ano2019" value="2019">2019</option><option id="ano2020" value="2020">2020</option><option id="ano2021" value="2021">2021</option><option id="ano2022" value="2022">2022</option><option id="ano2023" value="2023">2023</option><option id="ano2024" value="2024">2024</option><option id="ano2025" value="2025">2025</option><option id="ano2026" value="2026">2026</option><option id="ano2027" value="2027">2027</option><option id="ano2028" value="2028">2028</option><option id="ano2029" value="2029">2029</option><option id="ano2030" value="2030">2030</option><option id="ano2031" value="2031">2031</option><option id="ano2032" value="2032">2032</option><option id="ano2033" value="2033">2033</option><option id="ano2034" value="2034">2034</option><option id="ano2035" value="2035">2035</option><option id="ano2036" value="2036">2036</option><option id="ano2037" value="2037">2037</option></select>
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


