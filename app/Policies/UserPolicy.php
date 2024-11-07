<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('manage-user') ? $this->allow() : $this->denyAsNotFound();
    }

    public function view(User $user, User $model)
    {
        return $user->hasPermissionTo('view-user') ? $this->allow() : $this->denyAsNotFound();
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('create-user') ? $this->allow() : $this->denyAsNotFound();
    }

    public function update(User $user, User $model)
    {
        if($model->id == auth()->user()->id){
            return $this->allow();
        }
        if($user->hasPermissionTo('edit-user')){
            return $this->allow();
        }
        return $this->denyAsNotFound();
    }

    public function delete(User $user, User $model)
    {
        return $user->hasPermissionTo('delete-user') ? $this->allow() : $this->denyAsNotFound();
    }

}
