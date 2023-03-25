<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RolRecord
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $rol, $accion, $campos;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($rol, $accion, $campos)
    {
        //
        $this->rol = $rol;
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
