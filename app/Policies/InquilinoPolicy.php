<?php

namespace App\Policies;

use App\Inquilino;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InquilinoPolicy
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
        //return $user->id > 0;
       /* if ($user->can('user::view:all')) {
            return true;
        }

        return null;*/
  /* if ($user->isSuperAdmin->can('index')) {
        return true;
    }*/
        //return $user->id == $inquilino->user_id;
       // return in_array('index', $user->permissions);
       //return $user->id > 0;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Inquilino  $inquilino
     * @return mixed
     */
    public function view(User $user)
    {
        if($user->can('adminApp')){
            return true;

        }
        //melhorar e ver só os inquilinos do proprietário.
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, Inquilino $inquilino)
    {
        if($user->can('adminApp')){
            return true;
        }elseif($user->can('accessAsLandlord')){
             return $user->id == $inquilino->user_id;
        }

        return $user->id > 0;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Inquilino  $inquilino
     * @return mixed
     */
    public function update(User $user, Inquilino $inquilino)
    {
        if($user->can('AdminApp')){
            return true;
        }elseif($user->can('accessAsTenant')) {
            return $user->id == $inquilino->user_id;
        }
            return false;

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Inquilino  $inquilino
     * @return mixed
     */
    public function delete(User $user, Inquilino $inquilino)
    {
        return $user->id == $inquilino->user_id;;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Inquilino  $inquilino
     * @return mixed
     */
    public function restore(User $user, Inquilino $inquilino)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Inquilino  $inquilino
     * @return mixed
     */
    public function forceDelete(User $user, Inquilino $inquilino)
    {
        //
    }
}
