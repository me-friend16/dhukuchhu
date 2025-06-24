<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->paginate(10);
        return view('user.pages.services.index', compact('services'));
    }

    public function create()
    {
        return view('user.pages.services.create');
    }

    public function store(StoreServiceRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('services/icons', 'public');
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services/images', 'public');
        }

        Service::create($data);

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    public function show(Service $service)
    {
        return view('user.pages.services.view', compact('service'));
    }

    public function edit(Service $service)
    {
        return view('user.pages.services.edit', compact('service'));
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        $data = $request->validated();

        if ($request->hasFile('icon')) {
            // Delete old icon if it exists
            if ($service->icon) {
                Storage::disk('public')->delete($service->icon);
            }
            $data['icon'] = $request->file('icon')->store('services/icons', 'public');
        }

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $data['image'] = $request->file('image')->store('services/images', 'public');
        }

        $service->update($data);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        // Delete associated files
        if ($service->icon) {
            Storage::disk('public')->delete($service->icon);
        }
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }
}