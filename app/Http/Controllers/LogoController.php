<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use App\Http\Requests\StoreLogoRequest;
use App\Http\Requests\UpdateLogoRequest;
use Illuminate\Support\Facades\Storage;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logo = Logo::first();
        if($logo)
        {
            return redirect()->route('logo.show', $logo->id);
        }
        return redirect()->route('logo.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.pages.logo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLogoRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('logo_images', 'public');

            // Create a product record
            $logo = Logo::create([
                'name' => $request->input('name'),
                'phone1' => $request->input('phone1'),
                'phone2' => $request->input('phone2'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
                'map' => $request->input('map'),
                'slogan' => $request->input('slogan'),
                'vision' => $request->input('vision'),
                'mission' => $request->input('mission'),
                'image' => $path,
            ]);
        }
        return redirect()->route('logo.show', $logo->id)->with('success', 'Company Details added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Logo $logo)
    {
        return view('user.pages.logo.view',[
            'logo'=>$logo,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Logo $logo)
    {
        return view('user.pages.logo.edit',[
            'logo'=>$logo 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLogoRequest $request, Logo $logo)
    {
        $logo->name = $request->input('name');
        $logo->phone1 = $request->input('phone1');
        $logo->phone2 = $request->input('phone2');
        $logo->email = $request->input('email');
        $logo->address = $request->input('address');
        $logo->map = $request->input('map');
        $logo->slogan = $request->input('slogan');
        $logo->vision = $request->input('vision');
        $logo->mission = $request->input('mission');

         if ($request->hasFile('image')) {

            //to delete old
            if (Storage::disk('public')->exists($logo->image)) {
                Storage::disk('public')->delete($logo->image);
            }

            //to store new
            $image = $request->file('image');
            $path = $image->store('logo_images', 'public');

            $logo->image = $path;
        }

        // Save updated event
        $logo->save();

        // Redirect back with success message
       return redirect()->route('logo.show', $logo->id)->with('success', 'Company details edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Logo $logo)
    {
        //
    }
}
