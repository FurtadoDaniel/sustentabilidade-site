@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($especies as #especie)
                    <div class="card">
                        <div href={{ url('/adotar/'+$especie>id)}} class="card-header">{{$especie->nome}}</div>
                        <div class="card-body">
                            <div class="col-md-6">
                                <h4> Info </h4>
                                <p> {{ $especie->info }} </p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-6">
                                <h4> Kit </h4>
                                <p> {{ $especie->produto }} </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection


