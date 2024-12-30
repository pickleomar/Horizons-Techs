<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function registerNewUser(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email  = $request->email;
        $user->passworld = Hash::make($request->password);
        $user->save();
        return back()->with("success", "User created Successfully");
    }

    public function register(Request $request)
    {

        return view("register");
    }
}