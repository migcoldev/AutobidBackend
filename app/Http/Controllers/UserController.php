<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use Mail;
use Storage;
use Carbon\Carbon;

class UserController extends Controller
{

    public function me(Request $request)
    {
        $user = $request->user();
        return response()->json($user);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'user'       => 'required|string|email',
            'password'    => 'required|string'
        ]);
        $hashed = Hash::make(trim($request->password), [
            'rounds' => 12,
        ]);
        $user = new User([
            'name' => trim($request->name),
            'email' => trim($request->user),
            'password' => $hashed,
            'code' => Str::random(10),
            'id_role' => intval($request->id_role),
            'status' => 1,
        ]);
        $user->save();
        return response()->json($user);
    }
}