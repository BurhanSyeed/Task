<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter the product name.',
            'price.required' => 'Please enter the product price.',
            'price.numeric' => 'The product price must be a number.',
            'price.min' => 'The product price must be at least 1.',
        ];
    }
}
