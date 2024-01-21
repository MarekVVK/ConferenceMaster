<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ConferenceRegistrationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them
| will be assigned to the "web" middleware group.
| Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Corrected route for the client conferences list
Route::get('/client/conferenceslist', [ClientController::class, 'index']);

// Add a similar corrected route for the employee conferences list
// Assuming you have an EmployeeController with an 'index' method
Route::get('/employee/conferenceslist', [EmployeeController::class, 'index']);

// Route for viewing detailed information about a specific conference
// Uses the 'view' method in ConferenceController and has a named route 'conferences.view'
Route::get('/conference/{conference}', [ConferenceController::class, 'view'])->name('conferences.view');

Route::get('/register/conference/{id}', [ConferenceRegistrationController::class, 'register'])->name('register.conference');
Route::delete('/unregister/conference/{id}', [ConferenceRegistrationController::class, 'unregister'])->name('unregister.conference');

// Route for viewing conference registrations by employees
Route::get('/employee/conference/{conference}/registrations', [EmployeeController::class, 'viewRegistrations'])->name('conferences.view.registrations');

// Authentication routes (Login, Registration, etc.) provided by Laravel
Auth::routes();

// Route for the user's home page after logging in
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
