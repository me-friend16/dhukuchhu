<?php

// app/Http/Controllers/User/LogoController.php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use App\Http\Requests\UpdateLogoRequest;
use Illuminate\Support\Facades\Storage;

class LogoController extends Controller
{
    /**
     * Show the form for editing the company details.
     */
    public function index()
    {
        // Get the first record, or create a new empty one if it doesn't exist.
        // This prevents errors on a fresh install.
        $logo = Logo::firstOrCreate(['id' => 1]);

        return view('user.logo.index', compact('logo'));
    }

    /**
     * Update the company details in storage.
     */
    public function update(UpdateLogoRequest $request)
    {
        $logo = Logo::firstOrCreate(['id' => 1]);
        $data = $request->validated();

        // Handle Logo Image Upload
        if ($request->hasFile('logo_image')) {
            if ($logo->logo_image) {
                Storage::disk('public')->delete($logo->logo_image);
            }
            $data['logo_image'] = $request->file('logo_image')->store('logos', 'public');
        }

        // Handle Favicon Upload
        if ($request->hasFile('favicon')) {
            if ($logo->favicon) {
                Storage::disk('public')->delete($logo->favicon);
            }
            $data['favicon'] = $request->file('favicon')->store('logos', 'public');
        }

        $logo->update($data);

        return redirect()->route('logo.index')->with('success', 'Company details updated successfully.');
    }
}