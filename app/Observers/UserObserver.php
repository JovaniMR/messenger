<?php

namespace App\Observers;

use App\Conversation;
use App\Events\MessageSent;
use App\Message;
use App\User;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */

    public function created(User $user)
    {
        $userId = $user->id;
        $userTime = $user->created_at;

        $contacts = User::Where('id', '!=', $userId)->get();

        foreach ($contacts as $contact) {

            $conversation = new Conversation();
            $conversation->user_id = $userId;
            $conversation->contact_id = $contact->id;
            $conversation->last_message = 'Tu: Saludame soy nuevo usuario';
            $conversation->last_time = $userTime;

            $conversation->save();

            $conversation = new Conversation();
            $conversation->user_id = $contact->id;
            $conversation->contact_id = $userId;
            $conversation->last_message = " $user->name: Saludame soy nuevo usuario";
            $conversation->last_time = $userTime;

            $conversation->save();

            $message = new Message();
            $message->from_id = $userId;
            $message->content = 'Saludame soy nuevo usuario';
            $message->to_id = $contact->id;

            $message->save();

        }
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
