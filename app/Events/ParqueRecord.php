<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ParqueRecord
{
    public $parque;
    public $accion, $camposActualizados, $fechaCreacion, $fechaActualizacion;
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($parque, $accion, $camposActualizados)
    {
        //
        $this->parque = $parque;
        $this->accion = $accion;
        $this->camposActualizados = $camposActualizados;
        $this->fechaActualizacion = $parque->updated_at;
        $this->fechaCreacion = $parque->created_at;
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
