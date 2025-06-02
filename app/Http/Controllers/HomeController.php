<?php

namespace App\Http\Controllers;

use App\Models\Event;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::latest()->take(6)->get(); // ou ->paginate(6)
        return view('welcome', compact('events'));
    }
}
