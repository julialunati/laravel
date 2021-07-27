<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Contracts\Social as SocialContract;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function init(string $driver = 'vkontakte')
    {
        return Socialite::driver($driver)->redirect();
    }
    public function callback(string $driver = 'vkontakte', SocialContract $social)
    {
        $social->userInit(
            Socialite::driver($driver)->user()
        );
        return redirect()->route('account');
        
    }
}
