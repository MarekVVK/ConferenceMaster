<?php

use App\Http\Controllers\Admin\AdminConferenceController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\ConferenceRegistrationController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a "web" middleware group.
| Create something great!
|
*/

// Route to the welcome page
Route::get('/', function () {
    return view('welcome');
});

// Client: route to list conferences
Route::get('/client/conferenceslist', [ClientController::class, 'index']);

// Employee: route to list conferences
Route::get('/employee/conferenceslist', [EmployeeController::class, 'index']);

// Detailed view of a specific conference
Route::get('/conference/{conference}', [ConferenceController::class, 'view'])->name('conferences.view');

// Register for a conference
Route::get('/register/conference/{id}', [ConferenceRegistrationController::class, 'register'])->name('register.conference');

// Unregister from a conference
Route::delete('/unregister/conference/{id}', [ConferenceRegistrationController::class, 'unregister'])->name('unregister.conference');

// Employee: view registrations for a specific conference
Route::get('/employee/conference/{conference}/registrations', [EmployeeController::class, 'viewRegistrations'])->name('conferences.view.registrations');

// Admin: main dashboard
Route::get('/admin', [AdminConferenceController::class, 'index']);

// Admin: list conferences
Route::get('/admin/conferences', [AdminConferenceController::class, 'conferences'])->name('admin.admin_conferences');

// Admin: create a new conference form
Route::get('/admin/conferences/create', [AdminConferenceController::class, 'createConference'])->name('admin.admin_conferences_create');

// Admin: store a new conference
Route::post('/admin/conferences/store', [AdminConferenceController::class, 'storeConference'])->name('admin.store_conference');

// Admin: edit conferences
Route::get('/admin/conferences/edit/', [AdminConferenceController::class, 'editConferences'])->name('admin.admin_conferences_edit');

// Admin: edit a specific conference
Route::get('/admin/conferences/edit/{id}', [AdminConferenceController::class, 'editConferences'])->name('admin.admin_conferences_edit');

// Admin: update a conference
Route::put('/admin/conferences/update/{id}', [AdminConferenceController::class, 'updateConference'])->name('admin.conferences.update');

// Admin: delete a conference
Route::delete('/admin/conferences/destroy/{id}', [AdminConferenceController::class, 'destroyConference'])->name('admin.conferences.destroy');

// Admin: list all users in the admin dashboard
Route::get('/admin/users', [AdminUsersController::class, 'index'])->name('admin.users');

// Admin: edit a specific user
Route::get('/admin/users/edit/{id}', [AdminUsersController::class, 'edit'])->name('admin.users.edit');

//Admin: update a specific user
Route::put('/admin/users/update/{id}', [AdminUsersController::class, 'update'])->name('admin.users.update');

// Authentication routes (Login, Registration, etc.) provided by Laravel
Auth::routes();

// User home page after logging in
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
