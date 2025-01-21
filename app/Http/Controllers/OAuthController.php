<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class OAuthController extends Controller
{
    // GitHub
    public function redirectToGitHub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGitHubCallback()
    {
        try {
            $user = Socialite::driver('github')->user();
            $this->loginOrCreateUser($user, 'github');
            return redirect()->route('home');
        } catch (\Exception $e) {
            return redirect()->route('login')->with("error", 'Unable to login with GitHub :' . $e->getMessage());
        }
    }

    private function loginOrCreateUser($providerUser, $provider)
    {
        $user = User::where('provider_id', $providerUser->getId())->first();
        if (!$user) {
            $user = User::create([
                'name' => $providerUser->getName(),
                'email' => $providerUser->getEmail(),
                'provider' => $provider,
                'provider_id' => $providerUser->getId(),
                'avatar' => $providerUser->getAvatar(),
                "password" => null,
            ]);
        }
        Auth::login($user, true);
    }
}