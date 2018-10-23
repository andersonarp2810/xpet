<?php

namespace App\Policies;

use App\User;
use App\Phone;
use Illuminate\Auth\Access\HandlesAuthorization;

class PhonePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the address.
     *
     * @param  \App\User  $user
     * @param  \App\Address  $address
     * @return mixed
     */
    public function view(User $user, Phone $phone)
    {
        //
        return true;
    }

    /**
     * Determine whether the user can create addresses.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return true;
    }

    /**
     * Determine whether the user can update the address.
     *
     * @param  \App\User  $user
     * @param  \App\Address  $address
     * @return mixed
     */
    public function update(User $user, Phone $phone)
    {
        //
        return $user->id === $phone->user_id;
    }

    /**
     * Determine whether the user can delete the address.
     *
     * @param  \App\User  $user
     * @param  \App\Address  $address
     * @return mixed
     */
    public function delete(User $user, Phone $phone)
    {
        //
        return $user->id == $phone->user_id;
    }

    /**
     * Determine whether the user can restore the address.
     *
     * @param  \App\User  $user
     * @param  \App\Address  $address
     * @return mixed
     */
    public function restore(User $user, Phone $phone)
    {
        //
        return $user->id == $phone->user_id;
    }

    /**
     * Determine whether the user can permanently delete the address.
     *
     * @param  \App\User  $user
     * @param  \App\Address  $address
     * @return mixed
     */
    public function forceDelete(User $user, Phone $phone)
    {
        //
        return $user->id == $phone->user_id;
    }
}
