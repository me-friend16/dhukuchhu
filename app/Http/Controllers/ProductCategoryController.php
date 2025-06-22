<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProductCategory::all();
        return view('user.pages.product.category.index',[
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.pages.product.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductCategoryRequest $request)
    {
                // Create a product record
        $category = ProductCategory::create([
            'name' => $request->input('name')
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('product_category_images', 'public');
            $category->description = $request->input('description');
            $category->image = $path;
            $category->save();
        }
    
        return redirect()->route('category.index')->with('success', 'Product category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $category)
    {
        $products = $category->products()->get();
        return view('user.pages.product.category.view',[
            'category'=>$category,
            'products'=>$products
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $category)
    {
        return view('user.pages.product.category.edit',[
            'category'=>$category 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductCategoryRequest $request, ProductCategory $category)
    {
        $category->name = $request->input('name');
        $category->description = $request->input('description');

         if ($request->hasFile('image')) {

            //to delete old
            if (Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }

            //to store new
            $image = $request->file('image');
            $path = $image->store('product_category_images', 'public');

            $category->image = $path;
        }

        // Save updated event
        $category->save();

        // Redirect back with success message
       return redirect()->route('category.show', $category->id)->with('success', 'Product Category details edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $category)
        {
            // To prevent N+1 query issues when looping, eager load the relationships.
            $category->load('products.images');

            // 1. Delete all images associated with the products in this category
            foreach ($category->products as $product) {
                // Delete the product's main image
                if ($product->image) {
                    Storage::disk('public')->delete($product->image);
                }

                // Delete all of the product's gallery images
                foreach ($product->images as $productImage) {
                    if ($productImage->image) {
                        Storage::disk('public')->delete($productImage->image);
                    }
                }
            }
            
            // 2. Delete the category's own image
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }

            // 3. Delete the category from the database.
            // The `onDelete('cascade')` will handle deleting all related
            // product and product_image records from the database.
            $category->delete();

            // 4. Redirect back with a success message
            return redirect()->route('category.index') // Assuming you have a named route for the index page
                            ->with('success', 'Category and all its associated products and images have been deleted successfully.');
        }
}
