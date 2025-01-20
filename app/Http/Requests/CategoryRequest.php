<?php

namespace App\Http\Requests;

use App\Http\Resources\ErrorResource;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Nette\Schema\ValidationException;

class CategoryRequest extends FormRequest
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
            'name'=> 'required|string|unique:categories',
            'description'=> 'sometimes'
        ];
    }

    public function message():array
    {
        return[
            'name.required' => 'Please enter category',
            'name.string' => 'Please enter your name',
            'name.unique' =>'category already taken',
        ];

    }
//    protected function failedValidation(Validator $validator)
//    {
//       $respose = (new ErrorResource($validator->errors()))->response()->setStatusCode(422);
//       throw new ValidationException($validator, $respose);
//    }
}
