<?php

// app/Http/Requests/UpdateClientRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'type' => 'required|in:individual,company',
            'email' => [
                'nullable',
                'email',
                'max:255',
                Rule::unique('clients')->ignore($this->client->id),
            ],
            'phone' => 'required|string|max:20',
            'alt_phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'contact_person' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ];
    }
}