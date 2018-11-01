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
     * Determine whether the user can view the pet.
     *
     * @param  \App\User  $user
     * @param  \App\Pet  $pet
     * @return mixed
     */
    public function view(User $user, Pet $pet)
    {
        //
        return true;
    }

    /**
     * Determine whether the user can create pets.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, Pet $pet)
    {
        //
        return $user->id == $pet->user_id;
    }

    /**
     * Determine whether the user can update the pet.
     *
     * @param  \App\User  $user
     * @param  \App\Pet  $pet
     * @return mixed
     */
    public function update(User $user, Pet $pet)
    {
        //
        return $user->id == $pet->user_id;
    }

    /**
     * Determine whether the user can delete the pet.
     *
     * @param  \App\User  $user
     * @param  \App\Pet  $pet
     * @return mixed
     */
    public function delete(User $user, Pet $pet)
    {
        //
        return $user->id == $pet->user_id;
    }

    /**
     * Determine whether the user can restore the pet.
     *
     * @param  \App\User  $user
     * @param  \App\Pet  $pet
     * @return mixed
     */
    public function restore(User $user, Pet $pet)
    {
        //
        return $user->id == $pet->user_id;
    }

    /**
     * Determine whether the user can permanently delete the pet.
     *
     * @param  \App\User  $user
     * @param  \App\Pet  $pet
     * @return mixed
     */
    public function forceDelete(User $user, Pet $pet)
    {
        //
        return $user->id == $pet->user_id;
    }
}
