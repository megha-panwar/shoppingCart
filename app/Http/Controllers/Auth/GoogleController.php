<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Carbon\Carbon;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')
            ->scopes(['openid', 'profile', 'email'])
            ->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();

        $email = $googleUser->getEmail();
        if (!$email) {
            return redirect()->route('login')->withErrors('Google account has no email.');
        }

        $user = User::updateOrCreate(
            ['email' => $email],
            [
                'name'    => $googleUser->getName() ?: $googleUser->getNickname() ?: 'Google User',
                'google_id' => $googleUser->getId(),
                'avatar'    => $googleUser->getAvatar(),
                'password'  => isset(User::$passwordHashed) && User::$passwordHashed === false
                                ? Str::random(32)
                                : bcrypt(Str::random(32)),
                'google_token' => $googleUser->token,
                'google_refresh_token' => $googleUser->refreshToken ?? null,
                'google_token_expires_at' => isset($googleUser->expiresIn)
                    ? Carbon::now()->addSeconds($googleUser->expiresIn)
                    : null,
            ]
        );

        Auth::login($user, remember: true);

        return redirect()->intended('/dashboard');
    }
}
