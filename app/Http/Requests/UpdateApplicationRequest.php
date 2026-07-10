<?php
// app/Http/Requests/UpdateApplicationRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isAdmin() ?? false;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:50', 'unique:applications,code,' . $this->application->id],
            'description' => ['nullable', 'string', 'max:1000'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'department' => ['nullable', 'string', 'max:100'],
            'owner' => ['nullable', 'string', 'max:100'],
            'url' => ['required', 'url', 'max:255'],
            'environment' => ['required', 'in:Production,Staging,Development'],
            'status' => ['required', 'in:active,inactive,maintenance'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'icon' => ['nullable', 'image', 'max:1024'],
            'is_active' => ['boolean'],
        ];
    }
}