<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class LockAccUser implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $sender;

    public function __construct($message, User $sender)
    {
        $this->message = $message;
        $this->sender = $sender;
    }


    public function broadcastAs()
    {
        return 'server.created';
    }

    public function broadcastOn()
    {
        return [
            new PrivateChannel('lockacc.' . $this->sender->id),
            new Channel('caoson'),
        ];
    }

    public function broadcastWith()
    {
        return [
            'user' => $this->sender,
            'message' => $this->message
        ];
    }
}