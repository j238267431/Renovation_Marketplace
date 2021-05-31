<?php


namespace App\Services;


use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;

class RegisterUserBySocialService
{
    private RegisterController $adaptee;

    /**
     * RegisterUserBySocialService constructor.
     * @param RegisterController $adaptee
     */
    public function __construct(RegisterController $adaptee)
    {
        $this->adaptee = $adaptee;
    }

    /**
     * Адаптер для контроллера из коробки Ларавел
     * @param Request $request
     * @param $dataUser
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function register(Request $request, $dataUser)
    {
        $user['avatar'] = $dataUser->getAvatar()?? null;
        $request->session()->flash('user', $user);
        $request->merge([
            "name" => $dataUser->getName() ?? 'no Name',
            "email" => $dataUser->getEmail() ?? null,
            "password" => '123',
            "password_confirmation" => '123',
        ]);
        return $this->adaptee->register($request);
    }


}
