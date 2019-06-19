<?php

namespace App\Events;

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;
use App\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Broadcasting\PresenceChannel;

class SendMessage implements ShouldBroadcast
{
    use SerializesModels;

    public $message;
    public $user;

    public function __construct(Message $message)
    {
        $this->message = $message;
        $this->user    = Auth::user();
    }
    
    public function broadcastOn()
    {
        return new PresenceChannel("room.{$this->message->room_id}");
    }
}