@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Adote um(a) {{ $especie->nome }}</div>

                    <div class="card-body">

                            <h5 class="card-subtitle">
                                Parabéns, {{ Auth::user()->name }}, você está adotando um {{ $especie->nome }}!<br />
                                Sua doação será de grande ajuda para a preservação dessa espécies.
                            </p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('especies.update', $especie) }}">
                            @csrf
                            @method('patch')

                            <div class="form-group row">
                                <label for="valor" class="col-md-4 col-form-label text-md-right">{{ __('Quanto deseja doar?') }}</label>
                                <div class="col-md-6">
                                        <input id="valor" type="number" min="0.00" step="0.01" class="form-control" name="valor" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cartao" class="col-md-4 col-form-label text-md-right">{{ __('Cartão de crédito') }}</label>
                                <div class="col-md-6">
                                    <input id="cartao" type="text" class="form-control @error('cartao') is-invalid @enderror" name="cartao"  >
                                    @error('cartao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ "Cartão Inválido" }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group form-row">
                            <label for="cartao_validade" class="col-md-4 col-form-label text-md-right">{{ __('Validade') }}</label>
                            <div class="input-group col-md-6">
                                <select name="validade_mes" class="form-control col-md-auto">
                                    <option id="mes00"></option>
                                    <option id="mes01" value="01">01</option>
                                    <option id="mes02" value="02">02</option>
                                    <option id="mes03" value="03">03</option>
                                    <option id="mes04" value="04">04</option>
                                    <option id="mes05" value="05">05</option>
                                    <option id="mes06" value="06">06</option>
                                    <option id="mes07" value="07">07</option>
                                    <option id="mes08" value="08">08</option>
                                    <option id="mes09" value="09">09</option>
                                    <option id="mes10" value="10">10</option>
                                    <option id="mes11" value="11">11</option>
                                    <option id="mes12" value="12">12</option>
                                </select>
                                <select name="validade_ano" class="form-control col-md-auto">
                                    <option id="ano0000"></option>
                                    <option id="ano2019" value="2019">2019</option>
                                    <option id="ano2020" value="2020">2020</option>
                                    <option id="ano2021" value="2021">2021</option>
                                    <option id="ano2022" value="2022">2022</option>
                                    <option id="ano2023" value="2023">2023</option>
                                    <option id="ano2024" value="2024">2024</option>
                                    <option id="ano2025" value="2025">2025</option>
                                    <option id="ano2026" value="2026">2026</option>
                                    <option id="ano2027" value="2027">2027</option>
                                    <option id="ano2028" value="2028">2028</option>
                                    <option id="ano2029" value="2029">2029</option>
                                    <option id="ano2030" value="2030">2030</option>
                                    <option id="ano2031" value="2031">2031</option>
                                    <option id="ano2032" value="2032">2032</option>
                                    <option id="ano2033" value="2033">2033</option>
                                    <option id="ano2034" value="2034">2034</option>
                                    <option id="ano2035" value="2035">2035</option>
                                    <option id="ano2036" value="2036">2036</option>
                                    <option id="ano2037" value="2037">2037</option>
                                </select>
                            </div>
                            </div>                            
                            <div class="form-group row">
                                <label for="codigo" class="col-md-4 col-form-label text-md-right">{{ __('Código de segurança') }}</label>
                                <div class="col-md-6">
                                    <input id="codigo" type="text" class="form-control @error('codigo') inválido @enderror" name="codigo"  >
                                    @error('codigo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ "Código Inválido" }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome no cartão') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? Auth::user()->name }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Confirmar doação') }}
                                    </button>

                                    <a class="btn btn-link" href="{{ URL::previous() }}">
                                        {{ __('Cancelar') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
