<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SupportRequestController;


Route::get('/', function () {
    return view('welcome');
});

// Organization Routes
Route::get('/organizations', [OrganizationController::class, 'index'])->name('organizations.index');
Route::get('/organizations/create', [OrganizationController::class, 'create'])->name('organizations.create');
Route::post('/organizations', [OrganizationController::class, 'store'])->name('organizations.store');
Route::get('/organizations/{organization}', [OrganizationController::class, 'show'])->name('organizations.show');
Route::get('/organizations/{organization}/edit', [OrganizationController::class, 'edit'])->name('organizations.edit');
Route::put('/organizations/{organization}', [OrganizationController::class, 'update'])->name('organizations.update');
Route::delete('/organizations/{organization}', [OrganizationController::class, 'destroy'])->name('organizations.destroy');

// Employee Routes
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show');
Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');

// Support Request Routes
Route::get('/support-requests', [SupportRequestController::class, 'index'])->name('support-requests.index');
Route::get('/support-requests/create', [SupportRequestController::class, 'create'])->name('support-requests.create');
Route::post('/support-requests', [SupportRequestController::class, 'store'])->name('support-requests.store');
Route::get('/support-requests/{supportRequest}', [SupportRequestController::class, 'show'])->name('support-requests.show');
Route::get('/support-requests/{supportRequest}/edit', [SupportRequestController::class, 'edit'])->name('support-requests.edit');
Route::put('/support-requests/{supportRequest}', [SupportRequestController::class, 'update'])->name('support-requests.update');
Route::delete('/support-requests/{supportRequest}', [SupportRequestController::class, 'destroy'])->name('support-requests.destroy');

// Profit Routes
Route::get('/profits', [SupportRequestController::class, 'profit'])->name('profits.index');
Route::get('/earnings', [SupportRequestController::class, 'earnings'])->name('earnings');
