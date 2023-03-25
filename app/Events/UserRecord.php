<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserRecord
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $user, $accion, $campos;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, $accion, $campos)
    {
        //
        $this->user = $user;
        $this->accion = $accion;
        $this->campos = $campos;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
