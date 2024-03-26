@extends('layouts.app')

@section('content')
    <main class="content px-3 py-2">
        <div class="container">

            <div class="mb-3">
                <h1>Gewinnübersicht</h1>
            </div>


            <form action="{{ route('profits.index') }}" method="GET">
                <div class="row mb-4">
                    <div class="col-md-3">
                        <select name="year" class="form-control">
                            <option value="">Year</option>
                            @for ($i = now()->year; $i >= now()->year - 10; $i--)
                                <option value="{{ $i }}" {{ $i == $year ? 'selected' : '' }}>{{ $i }}
                                </option>
                            @endfor
                        </select>
                    </div>

                    <div class="col-md-3">
                        <select name="month" class="form-control">
                            <option value="">Month (optional)</option>
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}" {{ $i == $month ? 'selected' : '' }}>
                                    {{ DateTime::createFromFormat('!m', $i)->format('F') }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Filtern</button>
                    </div>
                </div>
            </form>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>Organisation</th>
                        <th>Gewinn ohne MwSt.</th>
                        <th>Gewinn mit MwSt.</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($profits as $profit)
                        <tr>
                            <td>{{ $profit->organization->name }}</td>
                            <td>{{ number_format($profit->total_profit, 2) }} €</td>
                            <td>{{ number_format($profit->total_profit_incl_tax, 2) }} €</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Keine Daten für das ausgewählte Datum.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
@endsection
