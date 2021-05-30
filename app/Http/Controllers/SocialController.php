<?php


namespace App\Http\Controllers;


use App\Services\SocialService;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    protected array $supportedServices = ['vkontakte', 'facebook'];

    /**
     * Отправка запроса на OAuth
     *
     * @param $service
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToProvider($service)
    {
        if (!in_array($service, $this->supportedServices)) {
            return redirect()->route('login')->with(['failed' => "Does`t exist $service method"]);
        }
        return Socialite::driver($service)->redirect();
    }

    /**
     * Возврат запроса и логика входа или регистрации пользователя из соц сети
     *
     * @param SocialService $socialService
     * @param $service
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback(SocialService $socialService,$service)
    {
        $user = Socialite::driver($service)->user();
        return $socialService->findOrCreateSocialUser($user);
    }
}
