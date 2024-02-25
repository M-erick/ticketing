<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
class EventController extends Controller
{
    
    public function index(){
        $events = Event::all();
        return view('events.index',compact('events'));
    }

    public function show($id){
        $event = Event::findOrFail($id);
        return view('events.show',compact('event'));

    }
    public function create()
    {
        return view('events.create');
    }

    // Store a newly created event in the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_datetime' => 'required|date',
            'end_datetime' => 'required|date|after:start_datetime',
            'vip_ticket_price' => 'required|numeric',
            'regular_ticket_price' => 'required|numeric',
            'max_attendees' => 'required|integer|min:1',
        ]);

        Event::create($request->all());

        return redirect()->route('events.index')->with('success', 'Event created successfully!');
    }

    // Show the form for editing an existing event
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    // Update the specified event in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_datetime' => 'required|date',
            'end_datetime' => 'required|date|after:start_datetime',
            'vip_ticket_price' => 'required|numeric',
            'regular_ticket_price' => 'required|numeric',
            'max_attendees' => 'required|integer|min:1',
        ]);

        $event = Event::findOrFail($id);
        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'Event updated successfully!');
    }

    // Remove the specified event from the database
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully!');
    }

}
