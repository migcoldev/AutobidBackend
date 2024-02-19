<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use Mail;
use Carbon\Carbon;

class AuthController extends Controller
{
    
    public function login(Request $request)
    {
        $validated = $request->validate([
            'user'       => 'required|string|email',
            'password'    => 'required|string'
        ]);
        $user = User::where('email', trim($request->user) )->first();
        if($user){
            if( Hash::check(trim($request->password), $user->password) || (Hash::check(trim($request->password), $user->temporal_password) && $user->temporal_password!="")){
                $tokenResult = $user->createToken('Personal Access Token');
                $token = $tokenResult->token;
                if ($request->remember_me) {
                    $token->expires_at = Carbon::now()->addWeeks(1);
                }
                $token->save();

    
                return response()->json([
                    'access_token' => $tokenResult->accessToken,
                    //'user_code' => $user->code, 
                    //'user_rol' => $user->id_role,
                    'user' => $user,
                    'token_type'   => 'Bearer',
                    'expires_at'   => Carbon::parse(
                        $tokenResult->token->expires_at)
                            ->toDateTimeString(),
                ]); 
            }else{
                return response()->json(['message' => __('messages.unauthorized')], 401);
            }
        }else{
            return response()->json(['message' => __('messages.user_not_found')], 400);
        }
    }
    
    public function signin(Request $request)
    {
        $validated = $request->validate([
            'user'       => 'required|string|email',
            'password'    => 'required|string'
        ]);
        $user = User::where('email', trim($request->user) )->whereIn("id_role", [1, 2])->first();
        if($user){
            if( Hash::check(trim($request->password), $user->password) || (Hash::check(trim($request->password), $user->temporal_password) && $user->temporal_password!="")){
                $tokenResult = $user->createToken('Personal Access Token');
                $token = $tokenResult->token;
                if ($request->remember_me) {
                    $token->expires_at = Carbon::now()->addWeeks(1);
                }
                $token->save();

    
                return response()->json([
                    'access_token' => $tokenResult->accessToken,
                    //'user_code' => $user->code, 
                    //'user_rol' => $user->id_role,
                    'user' => $user,
                    'token_type'   => 'Bearer',
                    'expires_at'   => Carbon::parse(
                        $tokenResult->token->expires_at)
                            ->toDateTimeString(),
                ]); 
            }else{
                return response()->json(['message' => __('messages.unauthorized')], 401);
            }
        }else{
            return response()->json(['message' => __('messages.user_not_found')], 400);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 
            'Successfully logged out']);
    }
}