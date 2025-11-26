<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreThreadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();   // allow only logged-in users
    }

    public function rules(): array
    {
        return [
            'title'       => 'required|string|max:255',
            'body'        => 'required|string|min:10',
            'category_id' => 'required|exists:forum_categories,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required'       => 'A thread title is required.',
            'body.required'        => 'Write something for your discussion.',
            'category_id.required' => 'Select a valid category.',
        ];
    }
}
