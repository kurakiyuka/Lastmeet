<?php

namespace App\Repositories;

use App\User;
use App\Event;

class EventRepository{
    /**
     * Get all of the events for a given user.
     *
     * @param User $user
     * @return Collection
     */
    public function findAllEventsForUser(User $user)
    {
        return Event::where('user_id', $user->id)
            ->orderBy('time', 'dsc')
            ->get();
    }

    /**
     * Get a list of events with some specified keyword.
     *
     * @param User $user
     * @return Collection
     */
    /*
    public function findKeyWordEvent(User $user)
    {
        return Event::where('user_id', $user->id)
            ->orderBy('created_at', 'asc')
            ->get();
    }
    */
}