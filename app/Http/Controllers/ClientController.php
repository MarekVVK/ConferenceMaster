<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ClientController extends Controller
{
    public function index() {
        $today = Carbon::today();
        $conferences = Conference::where('date', '>=', $today)->get();
        return view('conferences.list_client', compact('conferences'));
    }
}
