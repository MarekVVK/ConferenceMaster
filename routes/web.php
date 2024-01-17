<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConferenceController;

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

// Route for the home page
Route::get('/', function () {
    return view('welcome');
});

// Route for the list of conferences, uses the 'index' method in ConferenceController
Route::get('/conferenceslist', [ConferenceController::class, 'index']);

// Route for viewing detailed information about a specific conference
// Uses the 'view' method in ConferenceController and has a named route 'conferences.view'
Route::get('/conference/{conference}', [ConferenceController::class, 'view'])->name('conferences.view');

// Authentication routes (Login, Registration, etc.) provided by Laravel
Auth::routes();

// Route for the user's home page after logging in
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
