@extends('layouts.app')
@section('content')
<div class="col-md-12">
    <h1 class="display-4">Resultados</h1>

    <p class="lead text-muted">
        Existem {{ $searchResults->count() }} resultados para a sua pesquisa por "<em>{{ $pesquisa }}</em>".
    </p>

    @foreach($searchResults->groupByType() as $type => $modelSearchResults)
        <h3>{{ ucfirst($type) }}</h3>
        <div class="list-group">
        
            @foreach($modelSearchResults as $searchResult)
            
                <a href="{{ $searchResult->url }}" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex justify-content-between">
                        <h5 class="mb-1">{{ $searchResult->title }}</h5>
                    </div>
                </a>
            @endforeach
        </div>
        <br />
    @endforeach
</div>
@endsection