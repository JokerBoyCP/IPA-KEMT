<?php

namespace App\Http\Controllers;

use App\Models\SupportRequest;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Organization;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class SupportRequestController extends Controller
{
    /**
     * Display a listing of the support requests.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = SupportRequest::query();

        if ($request->filled('organization_id')) {
            $query->where('organization_id', $request->organization_id);
        }

        if ($request->filled('employee_id')) {
            $query->where('employee_id', $request->employee_id);
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        // Ändern Sie dies, um Paginierung zu verwenden
        $supportRequests = $query->paginate(9);

        $organizations = Organization::all();
        $employees = Employee::all();

        return view('support-requests.index', compact('supportRequests', 'organizations', 'employees'));
    }


    /**
     * Show the form for creating a new support request.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        // Annahme: 'employees' und 'organizations' sind für die Dropdown-Auswahl verfügbar
        $employees = Employee::all();
        $organizations = Organization::all();
        return view('support-requests.create', compact('employees', 'organizations'));
    }

    /**
     * Store a newly created support request in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'description' => 'required',
            'date' => 'required|date',
            'ticket_number' => 'integer',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'employee_id' => 'required|exists:employees,id',
            'organization_id' => 'required|exists:organizations,id',
        ]);

        // Kombinieren von Datum und Zeit für start_time und end_time
        $startDateTime = Carbon::createFromFormat('Y-m-d H:i', $request->date . ' ' . $request->start_time);
        $endDateTime = Carbon::createFromFormat('Y-m-d H:i', $request->date . ' ' . $request->end_time);

        // Erstellen eines neuen SupportRequest-Objekts mit den kombinierten DateTime-Werten
        $supportRequest = new SupportRequest([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'date' => $validatedData['date'],
            'ticket_number' => $validatedData['ticket_number'],
            'start_time' => $startDateTime, // Verwenden der kombinierten DateTime-Werte
            'end_time' => $endDateTime,     // Verwenden der kombinierten DateTime-Werte
            'employee_id' => $validatedData['employee_id'],
            'organization_id' => $validatedData['organization_id'],
        ]);

        $supportRequest->save();
        return redirect()->route('support-requests.index');
    }

    /**
     * Display the specified support request.
     *
     * @param SupportRequest $supportRequest
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(SupportRequest $supportRequest)
    {
        return view('support-requests.show', compact('supportRequest'));
    }

    /**
     * Show the form for editing the specified support request.
     *
     * @param SupportRequest $supportRequest
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(SupportRequest $supportRequest)
    {
        $employees = Employee::all();
        $organizations = Organization::all();
        return view('support-requests.edit', compact('supportRequest', 'employees', 'organizations'));
    }

    /**
     * Update the specified support request in storage.
     *
     * @param Request $request
     * @param SupportRequest $supportRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, SupportRequest $supportRequest)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'date' => 'required|date',
            'employee_id' => 'required|exists:employees,id',
            'organization_id' => 'required|exists:organizations,id',
            'ticket_number' => 'integer',
        ]);

        $supportRequest->update($validated);
        return redirect()->route('support-requests.index');
    }

    /**
     * Remove the specified support request from storage.
     *
     * @param SupportRequest $supportRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(SupportRequest $supportRequest)
    {
        $supportRequest->delete();
        return redirect()->route('support-requests.index');
    }

    /**
     * Calculate the profit for support requests.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profit(Request $request)
    {
        $year = $request->input('year', Carbon::now()->year);
        $month = $request->input('month');

        $query = SupportRequest::select(
            'organization_id',
            DB::raw('sum(EXTRACT(EPOCH FROM (end_time - start_time))/3600 * organizations.rate) as total_profit')
        )
            ->join('organizations', 'support_requests.organization_id', '=', 'organizations.id')
            ->whereYear('start_time', $year)
            ->groupBy('organization_id');

        if ($month) {
            $query->whereMonth('start_time', $month);
        }

        $profits = $query->get();

        // Berechnen des Gewinns inklusive MwSt
        foreach ($profits as $profit) {
            $profit->total_profit_incl_tax = $profit->total_profit * 1.077; // 7,7% MwSt.
        }

        return view('profits.index', compact('profits', 'year', 'month'));
    }



    public function earnings()
    {
        $currentMonthEarnings = SupportRequest::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('earnings');

        $lastMonthEarnings = SupportRequest::whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->whereYear('created_at', Carbon::now()->subMonth()->year)
            ->sum('earnings');

        // Berechnen der prozentualen Veränderung
        $percentageChange = $lastMonthEarnings > 0 ? (($currentMonthEarnings - $lastMonthEarnings) / $lastMonthEarnings) * 100 : 0;


        return view('profits.index', compact('currentMonthEarnings', 'percentageChange'));
    }
}
