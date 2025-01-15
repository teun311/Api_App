<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Notifications\LoginNotification;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    public function login(LoginRequest $request){

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($credentials)){
            $user = Auth::user();

            $user->tokens()->delete();
            $success['token'] = $user->createToken(request()->userAgent())->plainTextToken;
            $success['name'] = $user->first_name;
            $success['sucess'] = true;

           // Notification::sent($user, new LoginNotification());
            $user->notify(new LoginNotification());
            return response()->json($success,200);
        }
        else{
            return response()->json(['error' => "Unauthorized"],401);
        }
    }
}
