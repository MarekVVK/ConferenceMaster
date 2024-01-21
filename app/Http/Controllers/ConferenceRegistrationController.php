<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conference;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Log;

class ConferenceRegistrationController extends Controller
{
    public function register($conferenceId)
    {
        $user = Auth::user();
        $conference = Conference::findOrFail($conferenceId);

        // Check if the user is already registered for the conference
        if ($user->isRegisteredForConference($conference)) {
            return redirect()->back()->with('error', 'You are already registered for this conference.');
        }

        // Logic to register the user for the conference
        // This could involve adding a record to a pivot table that tracks registrations
        $user->conferences()->attach($conferenceId);

        // Log a message for registration
        Log::info('User registered for conference: '.$conference->title);

        // Redirect with a success message
        return redirect()->back()->with('status', 'Registered successfully!');
    }

    public function unregister($conferenceId)
    {
        $user = Auth::user();
        $conference = Conference::findOrFail($conferenceId);

        // Check if the user is registered for the conference
        if (!$user->isRegisteredForConference($conference)) {
            return redirect()->back()->with('error', 'You are not registered for this conference.');
        }

        // Logic to unregister the user from the conference
        // This could involve removing the record from the pivot table that tracks registrations
        $user->conferences()->detach($conferenceId);

        // Redirect with a success message
        return redirect()->back()->with('status', 'Unregistered successfully!');
    }
}
