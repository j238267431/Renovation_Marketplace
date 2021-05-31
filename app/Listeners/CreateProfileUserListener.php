<?php

namespace App\Listeners;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Client\Request;
use Illuminate\Queue\InteractsWithQueue;

class CreateProfileUserListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle($event)
    {
        if (isset($event->user) && $event->user instanceof User) {
            $userId = $event->user->id;
            $avatar = request()->session()->get('user.avatar')?? null;
            Profile::firstOrCreate(['user_id' => $userId],
                [
                    'user_id' => $userId,
                    'avatar' => $avatar,
                ]);
        }
    }
}
