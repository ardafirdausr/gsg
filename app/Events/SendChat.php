<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SendChat implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $chat;

    public function __construct($chat){
        $this->chat = $chat;
    }

    public function broadcastOn(){
        return (new Channel('chat.'.$this->chat->to));
    }

    public function broadcastAs(){
        return 'sendChat';
    }

    public function braodcastWith(){
        return [
            'name' => $this->chat->name,
            'from' => $this->chat->from,
            'to' => $this->chat->to,
            'message' => $this->chat->message,
            'image' => $this->chat->image,
            'sent_at' => $this->chat->send_at
        ];
    }
}
