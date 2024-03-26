@extends('layouts.app')

@section('content')
    <main class="content px-3 py-2">
        <div class="container-fluid">
            <div class="mb-3">
                <h2>Neue Organisation erstellen</h2>
            </div>

            <div class="row">
                <div class="col-12 col-md-5 d-flex">
                    <div class="card flex-fill  border-0">
                        <div class="card-body py-2">
                            <form action="{{ route('organizations.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name der Organisation</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="rate" class="form-label">Rate</label>
                                    <input type="number" step="0.01" class="form-control" id="rate" name="rate"
                                        required>
                                </div>
                                <button type="submit" class="btn btn-primary">Speichern</button>
                                <button type="button" onclick="window.history.back()"
                                    class="btn btn-secondary">Abbrechen</button>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </main>
@endsection
