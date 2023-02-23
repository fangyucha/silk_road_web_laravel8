<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Trade implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $roomid;
    public $character;
    public $attributes;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        // walk
        $this->roomid = $_POST["roomid"];
        $this->character = $_POST["character"];
        $this->attributes = json_decode($_POST["attributes"]);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PresenceChannel('room.'.$this->roomid);
    }
    public function broadcastAs()
    {
        return 'Trade';
    }
}
