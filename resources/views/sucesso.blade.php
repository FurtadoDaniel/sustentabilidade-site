@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Pagamento</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                Sucesso!
                            </div>
                        @endif

                        Pagamento efetuado com sucesso!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
