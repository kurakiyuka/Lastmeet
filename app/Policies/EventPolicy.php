<?php

namespace App\Policies;

use App\User;
use App\Event;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can delete the given event.
     *
     * @param User $user
     * @param Event $event
     * @return bool
     */
    public function destroy(User $user, Event $event)
    {
        return $user->id === $event->user_id;
    }
}
