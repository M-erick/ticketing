<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
use App\Models\Subscriber;

class EventController extends Controller
{

    // fetch the events to display in the welcom  page
    public function welcome(){

        $events_display = Event::all();
        
        // add pagination 
        $events_paginate =  Event::paginate(5); // 5 items per page



        $now =Carbon::now();
        $latestEvent = Event::where('start_datetime', '>=', $now)->orderBy('start_datetime')->first();

        return view('welcome',compact('events_display','latestEvent','events_paginate'));
    } 
    
    public function index(){
        $events = Event::all();
        $events_paginate =  Event::paginate(5); // 5 items per page

        return view('events.index',compact('events','events_paginate'));
    }

    public function show($id){
        $event = Event::findOrFail($id);
        $events = Event::all();


        return view('events.show',compact('event','events'));

    }
    public function create(Request $request)
    {
         // Check if the user has the 'admin' role
         if (!$request->user() || !$request->user()->hasRole('admin')) {
            abort(403, 'Unauthorized action.');
        }
        

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
            'location' => 'nullable|string|max:255',
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
    public function edit(Request $request ,$id)
    {
         // Check if the user has the 'admin' role
         if (!$request->user() || !$request->user()->hasRole('admin')) {
            abort(403, 'Unauthorized action.');
        }

        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    // Update the specified event in the database
    public function update(Request $request, $id)
    {
         // Check if the user has the 'admin' role
         if (!$request->user() || !$request->user()->hasRole('admin')) {
            abort(403, 'Unauthorized action.');
        }
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_datetime' => 'required|date',
            'end_datetime' => 'required|date|after:start_datetime',
            'vip_ticket_price' => 'required|numeric',
            'regular_ticket_price' => 'required|numeric',
            'max_attendees' => 'required|integer|min:1',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'location' => 'nullable|string|max:255',
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
    // get subscriber  details 

    public function subscribe(Request $request)
{
    $request->validate([
        'email' => 'required|email|unique:subscribers,email',
    ]);

    Subscriber::create(['email' => $request->input('email')]);

    return redirect()->back()->with('success', 'Subscription successful!');
}

   

}
