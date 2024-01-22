<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Conference;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminConferenceController extends Controller
{
    // Display the admin dashboard if the user is an admin, otherwise redirect to home
    public function index()
    {
        if (Auth::check() && Auth::user()->role == 'admin') {
            return view('admin.admin_dashboard');
        } else {
            return redirect('/');
        }
    }

    // Display a list of all conferences if the user is an admin, otherwise redirect to home
    public function conferences()
    {
        if (Auth::check() && Auth::user()->role == 'admin') {
            $conferences = Conference::all();
            return view('admin.admin_conferences', compact('conferences'));
        } else {
            return redirect('/');
        }
    }

    // Display the conference creation form if the user is an admin, otherwise redirect to home
    public function createConference()
    {
        if (Auth::check() && Auth::user()->role == 'admin') {
            return view('admin.admin_conferences_create');
        } else {
            return redirect('/');
        }
    }

    // Store a new conference in the database and redirect to the conference list with a success message
    public function storeConference(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|date',
            'venue' => 'nullable|string',
            'start_time' => 'nullable|date_format:H:i',
            'speakers' => 'nullable|string',
        ]);

        $conference = new Conference();
        $conference->title = $validatedData['title'];
        $conference->description = $validatedData['description'];
        $conference->date = $validatedData['date'];
        $conference->venue = $validatedData['venue'];
        $conference->start_time = $validatedData['start_time'];
        $conference->speakers = $validatedData['speakers'];
        $conference->save();

        return redirect()->route('admin.admin_conferences')->with('success', 'Conference successfully created!');
    }

    // Display the conference edit form if the user is an admin and the conference exists, otherwise redirect to home
    public function editConferences($id)
    {
        if (!Auth::check() || Auth::user()->role != 'admin') {
            return redirect('/');
        }

        $conference = Conference::findOrFail($id);

        return view('admin.admin_conferences_edit', compact('conference'));
    }

    // Update a specific conference and redirect to the conference list with a success message
    public function updateConference(Request $request, $id)
    {
        if (!Auth::check() || Auth::user()->role != 'admin') {
            return redirect('/');
        }

        $validatedData = $request->validate([
            'title' => 'required|string',
        ]);

        $conference = Conference::findOrFail($id);
        $conference->fill($validatedData);
        $conference->save();

        return redirect()->route('admin.admin_conferences')->with('success', 'Conference updated successfully!');
    }

    // Delete a specific conference and redirect to the conference list with a success message
    public function destroyConference($id)
    {
        $conference = Conference::findOrFail($id);

        $conferenceDateTime = Carbon::parse($conference->date . ' ' . $conference->start_time);

        if (Carbon::now()->lt($conferenceDateTime)) {
            $conference->delete();
            return redirect()->route('admin.admin_conferences')->with('success', 'Conference deleted successfully!');
        } else {
            return redirect()->route('admin.admin_conferences')->with('error', 'Cannot delete a conference that has already occurred.');
        }
    }


}
