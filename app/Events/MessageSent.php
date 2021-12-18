<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $message;
    public $id_from;
    public $id_to;
    public $created_at;
    public $type;
    public function __construct( $message, $id_from,$id_to,$created_at,$type)
    {
        //
        $this->message = $message;
        $this->id_from = $id_from;
        $this->id_to = $id_to;
        $this->created_at = $created_at;
        $this->type = $type;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */

    // public function broadcastWith()
    // {
    //     return ['id' => $this->user->id];
    // }
    public function broadcastOn()
    {
          return new Channel('channel-demo-real-time');
        // return new PrivateChannel('private-test-channel');
    }
}
