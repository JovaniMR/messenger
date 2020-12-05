<?php

namespace App\Observers;

use App\Conversation;
use App\Message;
use App\Events\MessageSent;

class MessageObserver
{
    /**
     * Handle the message "created" event.
     *
     * @param  \App\Message  $message
     * @return void
     */
    public function created(Message $message)
    {
        //Registra una nueva conversacion cuando es creado un mensaje  
        $conversation = Conversation::where('user_id', $message->from_id)
            ->where('contact_id', $message->to_id)->first();

        $conversation->last_message = "Tu: $message->content";
        $conversation->last_time = $message->created_at;
        $conversation->save();

        $conversation = Conversation::where('contact_id', $message->from_id)
            ->where('user_id', $message->to_id)->first();

        $conversation->last_message = "$conversation->contactName: $message->content";
        $conversation->last_time = $message->created_at;
        $conversation->save();

         event(new MessageSent($message));
    }

}
