<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    // Method to handle the request for the list of conferences
    public function index()
    {
        // Retrieve all conferences from the database
        $conferences = Conference::all();

        // Return the list view with the conferences data
        return view('conferences.list', compact('conferences'));
    }

    // Method to handle the request for viewing a specific conference
    public function view(Conference $conference)
    {
        // Return the view with details of a specific conference
        return view('conferences.view', compact('conference'));
    }
}
