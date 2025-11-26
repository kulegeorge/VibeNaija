<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();  // allow only logged-in users
    }

    public function rules(): array
    {
        return [
            'body'      => 'required|string|min:5',
            'thread_id' => 'required|exists:forum_threads,id',
        ];
    }

    public function messages()
    {
        return [
            'body.required'      => 'Your reply cannot be empty.',
            'body.min'           => 'Your reply must be at least 5 characters long.',
            'thread_id.required' => 'Invalid thread reference.',
        ];
    }
}
