@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Supportanfrage Details</h1>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $supportRequest->title }}</h4>
                <p>Beschreibung: {{ $supportRequest->description }}</p>
                <p>Startzeit: {{ $supportRequest->start_time }}</p>
                <p>Endzeit: {{ $supportRequest->end_time }}</p>
                <p>Bearbeitet von: {{ $supportRequest->employee->name ?? 'N/A' }}</p>
                <a href="{{ route('support-requests.index') }}" class="btn btn-primary">Zurück zur Übersicht</a>
            </div>
        </div>
    </div>
@endsection
