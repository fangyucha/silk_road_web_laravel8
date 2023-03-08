<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Walk implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $data;
    public $steps;
    public $character;
    public $otherStation;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        // walk
        $this->data = $data->roomid;
        $this->steps = json_decode($data->steps);
        $this->character = $data->character;
        $this->otherStation = $data->otherStation;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PresenceChannel('room.'.$this->data);
    }
    public function broadcastAs()
    {
        return 'Walk';
    }
}
