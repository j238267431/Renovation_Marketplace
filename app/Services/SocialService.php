<?php


namespace App\Services;


use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SocialService
{
    public function findOrCreateSocialUser($userFromSocial)
    {
        $email = $userFromSocial->getEmail();
        $name = $userFromSocial->getName();
        if (!isset($name) || $name == '') {
            $name = 'no Name';
        }
        $user = User::where('email', $email)->first();
        if (!isset($user) || !($user instanceof User)) {
            return User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make('123'),
            ]);
        }
        return $user;
    }
}
