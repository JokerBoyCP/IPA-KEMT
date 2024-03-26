@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Organisationsdetails</h1>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $organization->name }}</h4>
                <p>Rate: {{ $organization->rate }}</p>
                <a href="{{ route('organizations.index') }}" class="btn btn-primary">Zurück zur Übersicht</a>
            </div>
        </div>
    </div>
@endsection
