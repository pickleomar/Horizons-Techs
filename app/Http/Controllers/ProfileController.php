<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    protected $userService;


    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        return view("dashboard.profile");
    }


    public function update(Request $request)
    {

        $request->validate([
            "name" => "string|max:255",
            "avatar" => "image"
        ]);

        $data = [];
        $avatarName = "";

        if ($request->avatar) {
            $avatarName = time() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('avatars'), $avatarName);

            $data = [
                "name" => $request->name,
                "bio" => $request->bio,
                "avatar" => "avatars/$avatarName"
            ];
        } else {

            $data = [
                "name" => $request->name,
                "bio" => $request->bio,
            ];
        }

        $this->userService->updateUser(Auth::user()->id, $data);


        return redirect()->route("dashboard.profile");
    }
}
