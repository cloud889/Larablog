<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if(!auth()->user() || !auth()->role != 'admin') {
            return false;
        }
        else {
            return true;
        }
    }

    public function rules(): array
    {
        return $validated = [
                'title' => 'required',
                'message' => 'required|string|max:255',
        ];

    }
}
