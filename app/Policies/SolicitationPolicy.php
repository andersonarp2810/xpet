<?php

namespace App\Policies;

use App\Solicitation;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SolicitationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the solicitation.
     *
     * @param  \App\User  $user
     * @param  \App\Solicitation  $solicitation
     * @return mixed
     */
    public function view(User $user, Solicitation $solicitation)
    {
        //
        return $solicitation->requester_user_id == $user->id
        || $solicitation->requested_user_id == $user->id;
    }

    /**
     * Determine whether the user can create solicitations.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, Solicitation $solicitation)
    {
        //
        return $solicitation->requester_user_id == $user->id;
    }

    /**
     * Determine whether the user can update the solicitation.
     *
     * @param  \App\User  $user
     * @param  \App\Solicitation  $solicitation
     * @return mixed
     */
    public function update(User $user, Solicitation $solicitation)
    {
        // alterar status(?)
        return $solicitation->requester_user_id == $user->id
        || $solicitation->requested_user_id == $user->id;
    }

    /**
     * Determine whether the user can delete the solicitation.
     *
     * @param  \App\User  $user
     * @param  \App\Solicitation  $solicitation
     * @return mixed
     */
    public function delete(User $user, Solicitation $solicitation)
    {
        // o requisitado só pode negar mas quem requisitou pode apagar mesmo
        return $solicitation->requester_user_id == $user->id;
    }

}
