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
            'category_id' => 'required|integer',
            'name'=> 'required|string|max:100|unique:products',
            'description'=> 'required|string',
            'qty_stock'=> 'required|integer',
            'price'=> 'required|integer',
            'image'=>'nullable|image|mimes:jpg,jpeg,png|max:1536',
            'status'=> 'required',

        ];
    }

}
