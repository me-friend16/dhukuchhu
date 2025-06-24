<?php

// app/Http/Requests/UpdateLogoRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLogoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'slogan' => 'nullable|string|max:500',
            'primary_phone' => 'nullable|string|max:25',
            'secondary_phone' => 'nullable|string|max:25',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'map_embed_url' => 'nullable|url',
            'logo_image' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
            'favicon' => 'nullable|image|mimes:png,ico|max:512',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'social_links' => 'nullable|array',
            'social_links.*' => 'nullable|url', // Validates each social link is a URL
            'copyright_text' => 'nullable|string|max:255',
        ];
    }
}