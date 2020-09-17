<?php

namespace App\Policies;

use App\Stablishment;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StablishmentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Stablishment  $stablishment
     * @return mixed
     */
    public function view(User $user, Stablishment $stablishment)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Stablishment  $stablishment
     * @return mixed
     */
    public function update(User $user, Stablishment $stablishment)
    {
        return $user->id === $stablishment->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Stablishment  $stablishment
     * @return mixed
     */
    public function delete(User $user, Stablishment $stablishment)
    {
        return $user->id === $stablishment->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Stablishment  $stablishment
     * @return mixed
     */
    public function restore(User $user, Stablishment $stablishment)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Stablishment  $stablishment
     * @return mixed
     */
    public function forceDelete(User $user, Stablishment $stablishment)
    {
        //
    }
}
