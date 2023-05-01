<?php

namespace App\Policies;

use App\Models\Prospecto;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProspectoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prospecto  $prospecto
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Prospecto $prospecto)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prospecto  $prospecto
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Prospecto $prospecto)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prospecto  $prospecto
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Prospecto $prospecto)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prospecto  $prospecto
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Prospecto $prospecto)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Prospecto  $prospecto
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Prospecto $prospecto)
    {
        //
    }
}
