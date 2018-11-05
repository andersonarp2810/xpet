<?php

namespace App\Policies;

use App\Pet;
use App\Photo;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PetPolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can create pets.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function isOwner(User $user, Pet $pet)
    {
        //
        return $user->id == $pet->user_id;
    }
}
