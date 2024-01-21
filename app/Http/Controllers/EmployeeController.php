<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a list of conferences for employees.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retrieve all conferences
        $conferences = Conference::all();

        // Return the view with a list of conferences
        return view('conferences.list_employee', compact('conferences'));
    }

    /**
     * Display the registrations for a specific conference.
     *
     * @param  Conference $conference  The conference to view registrations for
     * @return \Illuminate\View\View
     */
    public function viewRegistrations(Conference $conference)
    {
        // Retrieve registrations for the conference
        $registrations = $conference->users;

        // Return the view with conference details and registrations
        return view('conferences.view_registrations', compact('conference', 'registrations'));
    }
}
