<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Gallery;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Http\Requests\UpdateGalleryRequest;
use Illuminate\Support\Facades\Storage;
use App\Helpers\NepaliDateHelper;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.pages.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $event = Event::create([
            'name' => $request->name,
            'event_date' => $request->event_date,
        ]);
    
        // Step 2: Handle each image upload
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('event_images', 'public'); // stores in storage/app/public/event_images
    
                // Create gallery record
                Gallery::create([
                    'event_id' => $event->id,
                    'image' => $path,
                ]);
            }
        }
    
        return redirect()->route('gallery.index')->with('success', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        $event->nepali_event_date = NepaliDateHelper::convertToNepaliDate($event->event_date);
        $galleries = $event->galleries()->get();
        return view('user.pages.gallery.view',[
            'event'=>$event,
            'galleries'=>$galleries
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('user.pages.gallery.edit',[
            'event'=>$event
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $event->name = $request->input('name');
        $event->event_date = $request->input('event_date'); // BS date as string, e.g. "2081-12-05"

        // Save updated event
        $event->save();

        // Redirect back with success message
        return redirect()->route('gallery.index')->with('success', 'Event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        // Delete gallery images from storage and DB
        foreach ($event->galleries as $gallery) {
            if (Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }
            $gallery->delete();
        }

        // Delete the event record
        $event->delete();

        // Redirect with success message
        return redirect()->route('gallery.index')->with('success', 'Event deleted successfully.');
    }

    public function addimage($id)
    {
        $event = Event::find($id);
        return view('user.pages.gallery.addimage',[
            'event'=>$event
        ]);
    }

    public function saveimage(UpdateGalleryRequest $request, $id)
    {
        $event = Event::find($id);
        
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('event_images', 'public'); // stores in storage/app/public/event_images
    
                // Create gallery record
                Gallery::create([
                    'event_id' => $event->id,
                    'image' => $path,
                ]);
            }
        }
    
        return redirect()->route('event.show', $event->id)->with('success', 'Event images added successfully.');
    }
}
