@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($especies as $especie)
                    <div class="card">
                        <a href="{{ url('/adotar/'. $especie->id)}}"> <div  class="card-header">{{$especie->nome}}</div> </a>
                        <div class="card-body">
                            <div class="col-md-6">
                                <h4> Info </h4>
                                <p> {{ $especie->descricao }} </p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-6">
                                <h4> Kit </h4>
                                <p> {{ $especie->kit }} </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection


