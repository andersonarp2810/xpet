<?php

namespace App\Policies;

use App\Phone;
use App\Solicitation;
use App\User;
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
        if ($phone->user->public_contact_info) {
            return true;
        }

        if ($phone->user_id == $user->id) {
            return true;
        }

        $solicitations = Solicitation::all()->where('requester_user_id', $user->id)->where('requested_user_id', $phone->user->id)->where('status', 'aceito');
        if (count($solicitations) > 0) {
            return true;
        }

        $solicitations = Solicitation::all()->where('requester_user_id', $phone->user->id)->where('requested_user_id', $user->id)->where('status', 'aceito');
        if (count($solicitations) > 0) {
            return true;
        }

        return false;
    }

    public function index(User $user, User $requisitado){ //$user é o autenticado 
        
        if ($requisitado->public_contact_info) {
            return true;
        }

        if ($requisitado->id == $user->id) {
            return true;
        }

        $solicitations = Solicitation::all()->where('requester_user_id', $user->id)->where('requested_user_id', $requisitado->id)->where('status', 'aceito');
        if (count($solicitations) > 0) {
            return true;
        }

        $solicitations = Solicitation::all()->where('requester_user_id', $requisitado->id)->where('requested_user_id', $user->id)->where('status', 'aceito');
        if (count($solicitations) > 0) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create addresses.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, Phone $phone)
    {
        //
        return $user->id === $phone->user_id;
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
