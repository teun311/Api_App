<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|min:5|max:30',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|min:8|max:25',
            'contact'=> 'required|digits:11',
        ];
    }

    public function message():array
    {
        return[
            'name.required' => 'Please enter your name',
            'name.min' => 'name must be atleast 5 charecture',
            'name.max' => 'name must not more than 30 charecture',
            'email.required' =>'please enter your email adderss',
            'email.email' =>'email must be vaild email',
            'email.unique' =>'email already taken',
            'password.required' =>'please enter your password',
            'password.min' =>'password must be at least 8 digits',
            'password.max' =>'password most not be more than 25 ',
            'phone.required' => 'please enter your phone number',
            'phone.digits' => 'phone number must be 11 digits'

        ];

    }
}
