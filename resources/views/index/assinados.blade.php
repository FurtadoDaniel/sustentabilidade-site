@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($assinados as #assinado)
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-6">
                                <h4> Descrição </h4>
                                <p> {{ $assinado->desc }} </p>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <form action={{ url('/assinar/'+$assinado>id)}}>
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Assinar') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection


