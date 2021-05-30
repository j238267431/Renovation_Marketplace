<?php

namespace App\Providers;

use App\Listeners\CreateProfileUserListener;
use App\Listeners\LoginListener;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use SocialiteProviders\Manager\SocialiteWasCalled;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            CreateProfileUserListener::class,
            SendEmailVerificationNotification::class,
        ],
        SocialiteWasCalled::class => [
            'SocialiteProviders\\Facebook\\FacebookExtendSocialite@handle',
            'SocialiteProviders\\VKontakte\\VKontakteExtendSocialite@handle',
        ],
        Login::class => [
            LoginListener::class,
        ]

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
