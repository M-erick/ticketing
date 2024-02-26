<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
class EventController extends Controller
{

    // fetch the events to display in the welcom  page
    public function welcome(){
        $events_display = Event::all();
        return view('welcome',compact('events_display'));
    } 
    
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
            // adding image display 
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $eventData = $request->except('image');

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public');
            $eventData['image_path'] = $imagePath;
        }


        Event::create($eventData);

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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);
        $eventData = $request->except('image');

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public');
            $eventData['image_path'] = $imagePath;
        }
    
        $event = Event::findOrFail($id);
        $event->update($eventData);
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
