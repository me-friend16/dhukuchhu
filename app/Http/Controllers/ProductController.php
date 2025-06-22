<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductCategory;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\UpdateProductImageRequest;
use App\Http\Requests\UpdateProductDisplayImageRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect()->route('category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ProductCategory $category)
    {
        return view('user.pages.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request, ProductCategory $category)
    {
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('product_images', 'public');
    
            // Create a product record
            $product = Product::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'image' => $path,
                'category_id' => $category->id
            ]);
            // Step 2: Handle each image upload
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('product_images', 'public'); // stores in storage/app/public/product_images
        
                    // Create gallery record
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => $path,
                    ]);
                }
            }
        }
    
        return redirect()->route('category.show', $category->id)->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $galleries = $product->images()->get();
        return view('user.pages.product.view',[
            'product'=>$product,
            'galleries'=>$galleries
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('user.pages.product.edit',[
            'product'=>$product 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->name = $request->input('name');
        $product->description = $request->input('description'); // BS date as string, e.g. "2081-12-05"

        // Save updated event
        $product->save();

        // Redirect back with success message
       return redirect()->route('product.show', $product->id)->with('success', 'Product images added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Delete images from storage and DB
        foreach ($product->images as $gallery) {
            if (Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }
            $gallery->delete();
        }

        // Delete the event record
        if (Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
        $product->delete();

        // Redirect with success message
        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }

    public function addimage($id)
    {
        $product = Product::find($id);
        return view('user.pages.product.addimage',[
            'product'=>$product
        ]);
    }

    public function saveimage(UpdateProductImageRequest $request, $id)
    {
        $product = Product::find($id);
        
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('product_images', 'public'); // stores in storage/app/public/event_images
    
                // Create gallery record
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $path,
                ]);
            }
        }
    
        return redirect()->route('product.show', $product->id)->with('success', 'Product images added successfully.');
    }

    public function destroyimage($id)
    {
        $productimage = ProductImage::find($id);
        // Delete image from storage
        if (Storage::disk('public')->exists($productimage->image)) {
            Storage::disk('public')->delete($productimage->image);
        }

        // Delete from database
        $productimage->delete();

        return back()->with('success', 'Image deleted successfully.');
    }

    public function changeimage($id)
    {
        $product = Product::find($id);
        return view('user.pages.product.changedispalypic',[
            'product'=>$product 
        ]);
    }

    public function savechangeimage(UpdateProductDisplayImageRequest $request, $id)
    {
        $product = Product::find($id);
        
        // Delete image from storage
        if (Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image') ->store('product_images', 'public');
        }

        $product->image = $path;
        $product->save();

        return redirect()->route('product.show', $product->id)->with('success', 'Product Display images added successfully.');
    }
}
