<?php

namespace App\Http\Controllers;

use App\Models\EquipmentCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EquipmentCategoryController extends Controller
{
    /**
     * Display a listing of the equipment categories.
     */
    public function index()
    {
        $categories = EquipmentCategory::orderBy('name')->paginate(10);
        return view('user.pages.equipment.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new equipment category.
     */
    public function create()
    {
        return view('user.pages.equipment.category.create');
    }

    /**
     * Store a newly created equipment category in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:equipment_categories,name',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only('name', 'description');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('equipment_categories', 'public');
        }

        EquipmentCategory::create($data);

        return redirect()->route('equipment-categories.index')->with('success', 'Equipment category created successfully.');
    }

    /**
     * Display the specified equipment category with its equipment.
     */
    public function show(EquipmentCategory $equipmentCategory)
    {
        // Load related equipment
        $equipmentCategory->load('equipment');

        return view('user.pages.equipment.category.view', [
            'category' => $equipmentCategory,
            'products' => $equipmentCategory->equipment,  // rename if needed to 'equipment'
        ]);
    }

    /**
     * Show the form for editing the specified equipment category.
     */
    public function edit(EquipmentCategory $equipmentCategory)
    {
        return view('user.pages.equipment.category.edit', compact('equipmentCategory'));
    }

    /**
     * Update the specified equipment category in storage.
     */
    public function update(Request $request, EquipmentCategory $equipmentCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:equipment_categories,name,' . $equipmentCategory->id,
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only('name', 'description');

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($equipmentCategory->image) {
                Storage::disk('public')->delete($equipmentCategory->image);
            }
            $data['image'] = $request->file('image')->store('equipment_categories', 'public');
        }

        $equipmentCategory->update($data);

        return redirect()->route('equipment-categories.show', $equipmentCategory)->with('success', 'Equipment category updated successfully.');
    }

    /**
     * Remove the specified equipment category from storage.
     */
    public function destroy(EquipmentCategory $equipmentCategory)
    {
        // Delete image if exists
        if ($equipmentCategory->image) {
            Storage::disk('public')->delete($equipmentCategory->image);
        }

        $equipmentCategory->delete();

        return redirect()->route('equipment-categories.index')->with('success', 'Equipment category deleted successfully.');
    }
}
