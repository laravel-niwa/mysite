<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class LoginsController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        //ログインの処理
        if (Auth::attempt($credentials)) {
            $user_id = Auth::id();
            $users = User::find($user_id);

            return response()->json($users->api_token);
        }
    }
}
