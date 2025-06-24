<?php

// app/Http/Requests/StoreServiceRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Allow authenticated users
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:services,name',
            'short_description' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:1024', // 1MB Max for icon
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',   // 2MB Max for image
            'status' => 'required|in:active,inactive',
        ];
    }
}