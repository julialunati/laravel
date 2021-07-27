<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\Social;
use App\Models\User as ModelUser;
use Laravel\Socialite\Contracts\User;
use Illuminate\Support\Facades\Auth;

class SocialService implements Social
{
    public function userInit(User $user): bool
    {
        $userData = ModelUser::where(['email' => $user->getEmail()])->first();
        if ($userData) {
            //auth user
            $userData->name = $user->getName();
            $userData->avatar = $user->getAvatar();
            if ($userData->save()) {
                Auth::loginUsingId($userData->id);

                return true;
            }
        } else {
            //create a new user in database 
            $newUser = ModelUser::create([
                'email' => $user->getEmail(),
                'name' => $user->getName(),
                'provider_id' => $user->getId(),
            ]);
            //log the user in 
            Auth::login($newUser);
            //redirect to main page 
            return true;
        }

        throw new \Exception("Ooops.. Something went wrong!");
    }
}
