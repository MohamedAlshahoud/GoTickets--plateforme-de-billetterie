<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $events = Event::orderBy('date', 'asc')->get();
        return view('events.index', compact('events'));
    }


    public function search(Request $request)
    {
        $query = \App\Models\Event::query();

        $title = trim($request->input('title'));
        $location = trim($request->input('location'));

        if (!empty($title)) {
            $query->where('title', 'ilike', '%' . $title . '%');
        }

        if (!empty($location)) {
            $query->where('location', 'ilike', '%' . $location . '%');
        }


        $events = $query->latest()->get();

        return view('events.search-results', compact('events'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
