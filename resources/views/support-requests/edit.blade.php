@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Supportanfrage bearbeiten</h1>
        <form action="{{ route('support-requests.update', $supportRequest->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Titel</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $supportRequest->title }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Beschreibung</label>
                <textarea class="form-control" id="description" name="description" required>{{ $supportRequest->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="start_time" class="form-label">Startzeit</label>
                <input type="datetime-local" class="form-control" id="start_time" name="start_time"
                    value="{{ $supportRequest->start_time->format('Y-m-d\TH:i') }}" required>
            </div>
            <div class="mb-3">
                <label for="end_time" class="form-label">Endzeit</label>
                <input type="datetime-local" class="form-control" id="end_time" name="end_time"
                    value="{{ $supportRequest->end_time->format('Y-m-d\TH:i') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Änderungen speichern</button>
        </form>
    </div>
@endsection
