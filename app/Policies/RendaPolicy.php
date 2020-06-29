<?php

namespace App\Policies;

use App\User;
use App\Renda;
use Illuminate\Auth\Access\HandlesAuthorization;

class RendaPolicy
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
     * @param  \App\Renda  $renda
     * @return mixed
     */
    public function view(User $user)
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
    public function create(User $user, Renda $renda)
    {
        if($user->can('adminApp')){
            return true;
        }elseif($user->can('accessAsLandlord')){
             return $user->id == $renda->user_id;
        }

        return $user->id > 0;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Renda  $renda
     * @return mixed
     */
    public function update(User $user, Renda $renda)
    {
        if($user->can('AdminApp')){
            return true;
        }elseif($user->can('accessAsLandlord')) {
            return $user->id == $renda->user_id;
        }
            return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Renda  $renda
     * @return mixed
     */
    public function delete(User $user, Renda $renda)
    {
       if($user->can('AdminApp')){
            return true;
        }elseif($user->can('accessAsLandlord')) {
            return $user->id == $renda->user_id;
        }
            return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Renda  $renda
     * @return mixed
     */
    public function restore(User $user, Renda $renda)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Renda  $renda
     * @return mixed
     */
    public function forceDelete(User $user, Renda $renda)
    {
        //
    }
}
