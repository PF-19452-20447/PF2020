 <?php

namespace App\Policies;

use App\Proprietario;
use App\User;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProprietarioPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user, User $model)
    {
        if($user->can('adminApp')){
            return true;
        }else{
            return $model->id == $user->id;
        }

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Proprietario  $proprietario
     * @return mixed
     */
    public function view(User $user, User $model)
    {
        if($user->can('adminApp')){
            return true;
        }else{
            return $user->id === $model->id;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, User $model)
    {
        if($user->can('adminApp')){
            return true;
        }else{
            return $model->id == $user->id;
        }

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Proprietario  $proprietario
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        if($user->can('AdminApp')){
            return true;
        }else {
            return $user->id === $model->id;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Proprietario  $proprietario
     * @return mixed
     */
    public function delete(User $user, Proprietario $proprietario, User $model)
    {
        if($user->can('adminApp')){
            return true;
        }else{
            return $user->id == $proprietario->user_id;
        }
        
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Proprietario  $proprietario
     * @return mixed
     */
    public function restore(User $user, Proprietario $proprietario)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Proprietario  $proprietario
     * @return mixed
     */
    public function forceDelete(User $user, Proprietario $proprietario)
    {
        //
    }
}
