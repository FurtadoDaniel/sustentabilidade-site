@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Qtd</th>
                                    <th scope="col">Produto</th>
                                    <th scope="col">Valor</th>
                                    <th scope="col">Soma</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carrinho as $item)
                                    <tr>
                                        <td>{{ $item['qtd'] }}</td>
                                        <td>{{ $item['produto'] }}</td>
                                        <td>R$ {{ $item['valor'] }}</td>
                                        <td>R$ {{ $item['valor'] * $item['qtd'] }}</td>
                                        <td><form method="post" action="{{route('retirar_carrinho', $item['id'])}}">
                                            @csrf
                                            <button type="submit" class="btn btn-link" style='color:red'>
                                                {{ __('Remover') }}
                                            </button>
                                        </form></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-md-6 offset-md-6 text-right">
                            <h5 class="card-text"><b>Total:</b> R$ {{ $total }}</h5>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('produtos.index') }}" type="submit" class="btn btn-lg btn-primary">
                            {{ __('Continuar comprando') }}
                        </a>
                        <a href="{{ route('confirmar_pagamento') }}" type="submit" class="btn btn-lg btn-success float-md-right">
                            Confirmar Pagamento
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


