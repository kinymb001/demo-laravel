<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use BeyondCode\LaravelWebSockets\Events\ConnectionClosed;
use BeyondCode\LaravelWebSockets\Events\ConnectionOpened;

class WebSocketEventListener
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

    public function onUserLogin()
    {
        Log::info("WebSocket connection open: {}");
    }

    /**
     * Handle user logout events.
     */
    public function onUserLogout()
    {
        Log::error("WebSocket  login connection close: {}");
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\LockAccUser',
            'App\Listeners\WebSocketEventListener@onUserLogin'
        );

        $events->listen(
            'Illuminate\Auth\Events\Login',
            'App\Listeners\WebSocketEventListener@onUserLogin'
        );

        $events->listen(
            'Illuminate\Auth\Events\Logout',
            'App\Listeners\WebSocketEventListener@onUserLogout'
        );
    }

    public function handle()
    {
    }
}
