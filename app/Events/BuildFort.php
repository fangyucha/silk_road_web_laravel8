<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BuildFort implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $roomid;
    public $character;
    public $btn_loc;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        // walk
        $this->roomid = $data->roomid;
        $this->character = $data->character;
        $this->btn_loc = $data->btn_loc;
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
        return 'BuildFort';
    }
}
