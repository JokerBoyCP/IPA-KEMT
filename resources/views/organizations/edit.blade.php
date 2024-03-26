@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Organisation bearbeiten</h1>
        <form action="{{ route('organizations.update', $organization->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $organization->name }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="rate" class="form-label">Rate</label>
                <input type="number" class="form-control" id="rate" name="rate" value="{{ $organization->rate }}"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Änderungen speichern</button>
        </form>
    </div>
@endsection
