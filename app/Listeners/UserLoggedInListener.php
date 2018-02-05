<?php

namespace App\Listeners;

use App\Events\UserLoggedInEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserLoggedInListener
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
     * @param  UserLoggedInEvent  $event
     * @return void
     */
    public function handle(UserLoggedInEvent $event)
    {
        $message = $event->user->name." has just logged in!";
        \Storage::put("login-activity.txt", $message);
    }
}
