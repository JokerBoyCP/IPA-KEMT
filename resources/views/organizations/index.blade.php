@extends('layouts.app')

@section('content')
    <main class="content px-3 py-2">
        <div class="container-fluid">

            <div>
                <h2>Organisationen</h2>
                <br>
                <a href="{{ route('organizations.create') }}" class="btn" id="button-green">Organisation hinzufügen</a>
                <br>
                <br>

            </div>



            <div class="card ">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Rate</th>
                            <th>Aktionen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($organizations as $organization)
                            <tr>
                                <td>{{ $organization->name }}</td>
                                <td>{{ $organization->rate }}</td>
                                <td>
                                    <a href="{{ route('organizations.show', $organization) }}"
                                        class="btn btn-outline-primary btn-sm">Show</a>
                                    <a href="{{ route('organizations.edit', $organization) }}"
                                        class="btn btn-outline-warning btn-sm">Edit</a>
                                    <form action="{{ route('organizations.destroy', $organization) }}" method="POST"
                                        style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this organization?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
