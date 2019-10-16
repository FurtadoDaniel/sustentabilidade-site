@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($arvores as #arvore)
                    <div class="card">
                        <div href={{ url('/adotar_tree/'+$arvore>id)}} class="card-header">{{$arvore->nome}}</div>
                        <div class="card-body">
                            <div class="col-md-6">
                                <h4> Info </h4>
                                <p> {{ $arvore->info }} </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection


