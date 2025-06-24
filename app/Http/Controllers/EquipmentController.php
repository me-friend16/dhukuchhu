<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\EquipmentCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EquipmentController extends Controller
{
    /**
     * Display a listing of equipment.
     */
    public function index()
    {
        return redirect()->route('equipment-categories.index');
    }

    /**
     * Show the form for creating new equipment.
     * Accepts category ID as route parameter.
     */
    public function create($categoryId)
    {
        $category = EquipmentCategory::find($categoryId);
        return view('user.pages.equipment.create', compact('category'));
    }

    /**
     * Store a newly created equipment in storage.
     */
    public function store(Request $request, EquipmentCategory $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'model' => 'nullable|string|max:255',
            'serial_number' => 'nullable|string|max:255',
            'purchase_date' => 'nullable|date',
            'condition' => 'nullable|string|in:new,good,fair,needs repair,out of service',
            'location' => 'nullable|string|max:255',
            'status' => 'nullable|string|in:available,in use,under maintenance',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'notes' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('equipment', 'public');
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('hero_images', 'public');
        }
        Equipment::create([
            'equipment_category_id' => $category->id,
            'name' => $request->name,
            'notes' => $request->notes,
            'image' => $path,
        ]);

        return redirect()->route('equipment-categories.show', $category)->with('success', 'Equipment created successfully.');
    }

    /**
     * Display the specified equipment.
     */
    public function show(Equipment $equipment)
    {
        $equipment->load('category');
        return view('user.pages.equipment.show', compact('equipment'));
    }

    /**
     * Show the form for editing the specified equipment.
     */
    public function edit(Equipment $equipment)
    {
        $categories = EquipmentCategory::orderBy('name')->get();
        return view('user.pages.equipment.edit', compact('equipment', 'categories'));
    }

    /**
     * Update the specified equipment in storage.
     */
    public function update(Request $request, Equipment $equipment)
    {
        $validated = $request->validate([
            'equipment_category_id' => 'required|exists:equipment_categories,id',
            'name' => 'required|string|max:255',
            'model' => 'nullable|string|max:255',
            'serial_number' => 'nullable|string|max:255',
            'purchase_date' => 'nullable|date',
            'condition' => 'nullable|string|in:new,good,fair,needs repair,out of service',
            'location' => 'nullable|string|max:255',
            'status' => 'nullable|string|in:available,in use,under maintenance',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'notes' => 'nullable|string',
        ]);

         if ($request->hasFile('image')) {
            if ($equipment->image) {
                Storage::disk('public')->delete($equipment->image);
            }
            $image = $request->file('image');
            $path = $image->store('equipment', 'public');
            $equipment->image= $path;
        }
        $equipment->name=$request->name;
        $equipment->equipment_category_id=$request->equipment_category_id;
        $equipment->notes=$request->notes;
 

        $equipment->save();

        return redirect()->route('equipment-categories.show', $request->equipment_category_id)->with('success', 'Equipment Updated successfully.');
    }

    /**
     * Remove the specified equipment from storage.
     */
    public function destroy(Equipment $equipment)
    {
        if ($equipment->image) {
            Storage::disk('public')->delete($equipment->image);
        }

        $equipment->delete();

        return redirect()->back()->with('success', 'Equipment deleted successfully.');
    }
}
