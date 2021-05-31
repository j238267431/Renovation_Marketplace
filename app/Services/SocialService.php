<?php


namespace App\Services;


use App\Http\Controllers\Auth\RegisterController;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Support\Facades\Auth;

class SocialService
{
    use RedirectsUsers;

    protected string $redirectTo = RouteServiceProvider::HOME;

    public function findOrCreateSocialUser($userFromSocial)
    {
        $email = $userFromSocial->getEmail();
        if (empty($email) || !isset($email)) {
            return redirect()->route('login')
                ->with('failed', 'Соц сеть не передала почту, регистрация невозможна');
        }

        $user = User::where('email', $email)->first();
        if (!isset($user) || !($user instanceof User)) {
            $registerClass = new RegisterUserBySocialService(new RegisterController());
            return $registerClass->register(request(), $userFromSocial);
        }
        Auth::loginUsingId($user->id);
        return redirect()->route('login');
    }
}
