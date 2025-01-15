<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function register (RegistrationRequest $request){


        $newuser = $request->input();
       // dd($newuser);
        $newuser['password'] = Hash::make($newuser['password']);
        $newuser['role'] = 'user';
        $newuser['status'] = 1;
      //  dd($newuser);

        $user = User::create($newuser);

        $success['token'] = $user->createToken('user',['app:all'],now()->addDay())->plainTextToken;
       // $success['token'] = $user->createToken('user',['app:all'])->plainTextToken;
        $success['name'] = $user->first_name;
        $success['success'] = true;

        return response()->json($success,201);
//        return response()->json([
//            'data' => $user->confirmationOtp()->otp
//        ],200);
    }
}
