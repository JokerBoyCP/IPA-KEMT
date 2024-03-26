@extends('layouts.app')
@section('content')
    <main class="content px-3 py-2">
        <div class="container-fluid">
            <div class="mb-3">
                <h3>Create Issue</h3>
            </div>
            <div class="row">
                <div class="col-12 col-md-5 d-flex">
                    <div class="card flex-fill border-0">
                        <div class="card-body py-2">
                            <form action="{{ route('support-requests.store') }}" method="POST">
                                @csrf
                                <br>
                                <div class="mb-3">
                                    <label for="organization_id">Organization</label>
                                    <select class="form-select" id="organization_id" name="organization_id" required>
                                        <option value="">Bitte wählen...</option>
                                        @foreach ($organizations as $organization)
                                            <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 ">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" required>
                                </div>
                                <div class="mb-3 ">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" id="date" class="form-control" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="start_time">Start Time</label>
                                        <input type="time" name="start_time" id="start_time" class="form-control"
                                            required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="end_time">End Time</label>
                                        <input type="time" name="end_time" id="end_time" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-3 ">
                                        <label for="ticket_number">Jira Ticket</label>
                                        <input type="number" name="ticket_number" id="ticket_number" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="issue_type">Issue Type</label>
                                        <select class="form-select" id="issue_type" name="issue_type" required>
                                            <option value="">Bitte wählen...</option>
                                            <option value="1">Bug</option>
                                            <option value="2">Feature Request</option>
                                            <option value="3">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <label for="employee_id">Mitarbeiter</label>
                                        <select class="form-select" id="employee_id" name="employee_id" required>
                                            <option value="">Bitte wählen...</option>
                                            @foreach ($employees as $employee)
                                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" rows="10" required></textarea>
                                </div>
                                <div class="">
                                    <button type="submit" class="btn btn-primary col-md-4">Create Report</button>
                                    <a href="{{ route('support-requests.index') }}"
                                        class="btn btn-secondary col-md-4">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class=" col-md-4 d-flex ">
                    <div class="card flex-fill border-0">
                        <div class="card-body py-3">
                            <h5 class="card-title">Submitting an Issue</h5>
                            <br>
                            <p class="card-text">
                                Use this form to create a report:
                            <ul>
                                <li>
                                    <p>Organization:Choose where the issue happened.</p>
                                </li>
                                <li>
                                    <p>Date: When did it occur? (DD.MM.YYYY).</p>
                                </li>
                                <li>
                                    <p>Start/End Time: When did you notice the problem?</p>
                                </li>
                                <li>
                                    <p>Jira Ticket: If you have one, add your ticket number here.</p>
                                </li>
                                <li>
                                    <p>Issue Type: What kind of issue is it?</p>
                                </li>
                                <li>
                                    <p>Employee: Who's reporting this?</p>
                                </li>
                                <li>
                                    <p>Description: What happened? Be brief but clear.</p>
                                </li>
                            </ul>
                            <p>After filling out the form, click Create report to submit or Cancel to clear the form.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
