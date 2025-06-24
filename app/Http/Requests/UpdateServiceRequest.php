<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Allow authenticated users
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('services')->ignore($this->service->id),
            ],
            'short_description' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:1024',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'status' => 'required|in:active,inactive',
        ];
    }
}