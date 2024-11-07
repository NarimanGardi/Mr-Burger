<?php

namespace App\Policies;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('manage-role') ? $this->allow() : $this->denyAsNotFound();
    }


    public function view(User $user, Role $role)
    {
        return $user->hasPermissionTo('view-role') ? $this->allow() : $this->denyAsNotFound();
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('create-role') ? $this->allow() : $this->denyAsNotFound();
    }

    public function update(User $user, Role $role)
    {
        return $user->hasPermissionTo('edit-role') ? $this->allow() : $this->denyAsNotFound();
    }

    public function delete(User $user, Role $role)
    {
        return $user->hasPermissionTo('delete-role') ? $this->allow() : $this->denyAsNotFound();
    }
}
