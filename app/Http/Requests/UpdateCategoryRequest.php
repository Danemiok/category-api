<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'is_active'   => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'        => 'The name field is required.',
            'description.required' => 'The description field is required.',
        ];
    }

    // Return JSON error instead of redirect
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation error',
            'errors'  => $validator->errors(),
        ], 422));
    }
}