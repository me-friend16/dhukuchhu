<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();
        return view('user.pages.team.index',[
            'teams' => $teams
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.pages.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('team_images', 'public');
        }
            // Create a heroImage record
            $team = Team::create([
                'name' => $request->input('name'),
                'designation' => $request->input('designation'),
                'phone' => $request->input('phone'),
                'testimonial' => $request->input('testimonial'),
                'image' => $path,
            ]);
        return redirect()->route('team.index')->with('success', 'Team member created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        return view('user.pages.team.view',[
            'team'=>$team,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        return view('user.pages.team.edit',[
            'team'=>$team 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamRequest $request, Team $team)
    {
        $team->name = $request->input('name');
        $team->designation = $request->input('designation');
        $team->phone = $request->input('phone');
        $team->testimonial = $request->input('testimonial');

        if ($request->hasFile('image')) {

            //to delete old
            if (Storage::disk('public')->exists($team->image)) {
                Storage::disk('public')->delete($team->image);
            }

            //to store new
            $image = $request->file('image');
            $path = $image->store('team_images', 'public');

            $team->image = $path;
        }
        // Save updated event
        $team->save();

        // Redirect back with success message
       return redirect()->route('team.show', $team->id)->with('success', 'Team member details added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        // Delete the event record
        if (Storage::disk('public')->exists($team->image)) {
                Storage::disk('public')->delete($team->image);
            }
        $team->delete();

        // Redirect with success message
        return redirect()->route('team.index')->with('success', 'Team member deleted successfully.');
    }
}
