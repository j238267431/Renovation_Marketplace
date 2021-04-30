<?php


namespace App\Http\Controllers;


use App\Services\SocialService;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    protected array $supportedServices = ['vkontakte', 'facebook'];

    public function redirectToProvider($service)
    {
        if (!in_array($service, $this->supportedServices)) {
            return redirect()->route('login')->with(['failed' => "Does`t exist $service method"]);
        }
        return Socialite::driver($service)->redirect();
    }

    public function handleProviderCallback($service)
    {
        $user = Socialite::driver($service)->user();
        $result = (new SocialService())->findOrCreateSocialUser($user);
        if ($result) {
            Auth::loginUsingId($result->id);
            return redirect()->route('login');
        }
        return back(400);
    }

}
