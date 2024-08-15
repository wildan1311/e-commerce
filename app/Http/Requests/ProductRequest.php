<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required',
            'isActive' => [
                'required',
                'numeric',
                'between:0,1',
                Rule::prohibitedIf(function () {
                    return $this->get('stock') == 0 && $this->get('isActive') == 1;
                }),
            ],
            'image' => 'mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
