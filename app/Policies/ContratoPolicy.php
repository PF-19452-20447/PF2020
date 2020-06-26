<?php

namespace App\Policies;

use App\Contrato;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContratoPolicy
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
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Contrato  $contrato
     * @return mixed
     */
    public function view(User $user, Contrato $contrato)
    {
        if($user->can('adminApp')){
            return true;

        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, Contrato $contrato)
    {
        if($user->can('adminApp')){
            return true;
        }elseif($user->can('accessAsTenant')){
             return $user->id == $contrato->user_id;
        }

        return $user->id > 0;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Contrato  $contrato
     * @return mixed
     */
    public function update(User $user, Contrato $contrato)
    {
        if($user->can('AdminApp')){
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Contrato  $contrato
     * @return mixed
     */
    public function delete(User $user, Contrato $contrato)
    {
        return $user->id == $contrato->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Contrato  $contrato
     * @return mixed
     */
    public function restore(User $user, Contrato $contrato)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Contrato  $contrato
     * @return mixed
     */
    public function forceDelete(User $user, Contrato $contrato)
    {
        //
    }
}
