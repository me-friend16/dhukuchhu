<?php

namespace App\Http\Controllers;

use App\Models\HeroImage;
use App\Http\Requests\StoreHeroImageRequest;
use App\Http\Requests\UpdateHeroImageRequest;
use Illuminate\Support\Facades\Storage;

class HeroImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heroimages = HeroImage::all();
        return view('user.pages.heroimage.index',[
            'heroimages' => $heroimages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('user.pages.heroimage.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHeroImageRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('hero_images', 'public');
    
            // Create a heroImage record
            $heroimage = HeroImage::create([
                'name' => $request->input('name'),
                'link' => $request->input('link'),
                'image' => $path,
            ]);
        }
    
        return redirect()->route('heroimage.index')->with('success', 'Hero Image created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(HeroImage $heroimage)
    {
        return view('user.pages.heroimage.view',[
            'heroimage'=>$heroimage,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HeroImage $heroimage)
    {
        return view('user.pages.heroimage.edit',[
            'heroimage'=>$heroimage 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHeroImageRequest $request, HeroImage $heroimage)
    {
        $heroimage->name = $request->input('name');
        $heroimage->link = $request->input('link');

        if ($request->hasFile('image')) {

            //to delete old
            if (Storage::disk('public')->exists($heroimage->image)) {
                Storage::disk('public')->delete($heroimage->image);
            }

            //to store new
            $image = $request->file('image');
            $path = $image->store('hero_images', 'public');

            $heroimage->image = $path;
        }
        // Save updated event
        $heroimage->save();

        // Redirect back with success message
       return redirect()->route('heroimage.show', $heroimage->id)->with('success', 'Hero Image images added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HeroImage $heroimage)
    {
        // Delete the event record
        if (Storage::disk('public')->exists($heroimage->image)) {
                Storage::disk('public')->delete($heroimage->image);
            }
        $heroimage->delete();

        // Redirect with success message
        return redirect()->route('heroimage.index')->with('success', 'Hero Image deleted successfully.');
    }
}
