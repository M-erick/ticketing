<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Event;

class EventPolicy
{
    /**
     * Create a new policy instance.
     */
   
        public function create(User $user)
        {
            // Only admins can create events
            return $user->hasRole('admin');
        }
    
        public function update(User $user, Event $event)
        {
            // Only admins can update events
            return $user->hasRole('admin');
        }
    
        public function delete(User $user, Event $event)
        {
            // Only admins can delete events
            return $user->hasRole('admin');
        }
    
        public function reserve(User $user, Event $event)
        {
            // All users can make reservations
            return true;
        }
    }

