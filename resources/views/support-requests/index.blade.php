@extends('layouts.app')

@section('content')
    <main class="content px-3 py-2">
        <div class="container-fluid">

            <div class="mb-3">
                <h3>Issues overview</h3>
            </div>

            <div class="mb-4">
                <a href="{{ route('support-requests.create') }}" class="btn" id="button-green">Add new Issue</a>
            </div>

            <div class="mb-0">
                <form action="{{ route('support-requests.index') }}" method="GET">
                    <div class="row">
                        <div class="col-md-2">
                            <select class="form-control" name="organization_id">
                                <option value="">All organizations</option>
                                @foreach ($organizations as $organization)
                                    <option value="{{ $organization->id }}"
                                        {{ request('organization_id') == $organization->id ? 'selected' : '' }}>
                                        {{ $organization->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" name="employee_id">
                                <option value="">All users</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}"
                                        {{ request('employee_id') == $employee->id ? 'selected' : '' }}>
                                        {{ $employee->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input type="date" class="form-control" name="date" value="{{ request('date') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <button type="submit" class="btn " id="button-green">Filter</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card">
                <div class="card-body">

                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Time</th>
                            <th>Organization</th>
                            <th>User</th>
                            <th>Ticket</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($supportRequests as $supportRequest)
                            <tr>
                                <td>{{ $supportRequest->title }}</td>
                                <td>{{ $supportRequest->duration_in_minutes }} minutes</td>
                                <td>{{ $supportRequest->organization->name }}</td>
                                <td>{{ $supportRequest->employee->name }}</td>
                                <td> <a target="_blank"
                                        href="https://karger.atlassian.net/jira/servicedesk/projects/ISD/queues/custom/4/ISD-{{ $supportRequest->ticket_number }}">
                                        ISD-{{ $supportRequest->ticket_number }} </a></td>


                                <td>
                                    <a href="{{ route('support-requests.show', $supportRequest->id) }}"
                                        class="btn btn-outline-primary btn-sm">Show</a>
                                    <a href="{{ route('support-requests.edit', $supportRequest->id) }}"
                                        class="btn btn-outline-warning btn-sm">Edit</a>
                                    <form action="{{ route('support-requests.destroy', $supportRequest->id) }}"
                                        method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
        <div class="mb-3">
            {{ $supportRequests->appends(request()->except('page'))->links('pagination::bootstrap-4') }}
        </div>

    </main>
@endsection
