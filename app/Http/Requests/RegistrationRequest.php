<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required|min:5|max:30',
            'last_name' => 'required|min:5|max:30',
            'email'=> 'required|unique:users|email',
            'phone'=> 'required|unique:users,phone|digits:11',
            'password'=> 'required|min:8|max:25',
            'gender' => 'sometimes|max:10'
          //  'phone'=> 'required|unique:users,phone|digits_between:10,20',

        ];
    }

    public function message():array
    {
        return[
            'first_name.required' => 'Please enter your name',
            'first_name.min' => 'name must be atleast 5 charecture',
            'first_name.max' => 'name must not more than 30 charecture',
            'last_name.required' => 'Please enter your name',
            'last_name.min' => 'name must be atleast 5 charecture',
            'last_name.max' => 'name must not more than 30 charecture',
            'email.required' =>'please enter your email adderss',
            'email.email' =>'email must be vaild email',
            'email.unique' =>'email already taken',
            'password.required' =>'please enter your password',
            'password.min' =>'password must be at least 8 digits',
            'password.max' =>'password most not be more than 25 ',
            'phone.required' => 'please enter your phone number',
           // 'phone.unique' =>'phone already taken',
            'phone.digits' => 'phone number must be 11 digits'

        ];

    }
}
