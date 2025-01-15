<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return response()->json([
            'success' => 'ok',
            'data'=> $user
        ],200);
    }

    /**
     * Register for new User.
     */
    public function register(RegisterRequest $request)
    {

        try {
          $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password) ,
                'contact' => $request->contact,
//                'status'=> 1
            ]);
          if ($user){
              return response()->json([
                 'status' => 'ok',
                 'message' => 'user has been register successfully',
                 'data' =>$user ,
              ],201);
          }
          return response()->json([
              'status' => 'no',
              'message' => 'unable to register'

          ],400);

        }catch (Exception $e){
            Log::error('unable to register user:' . $e->getMessage().' -Line no. ' . $e->getLine());
            return response()->json([
                'message'=>'unable to register 1'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
