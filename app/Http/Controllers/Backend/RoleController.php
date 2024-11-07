<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CreateRoleRequest;
use App\Http\Requests\Backend\UpdateRoleRequest;
use Spatie\Permission\Models\Role;
class RoleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Role::class, 'role');

    }

    public function index()
    {
        $roles = Role::select('id','name')->with('permissions')->withCount('users')->paginate('10');
        return view('backend.pages.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions
        = [
            'manage-role', 'view-role', 'create-role', 'edit-role', 'delete-role',
            'manage-user', 'view-user', 'create-user', 'edit-user', 'delete-user', 'toggle-user-status',
            'manage-client', 'view-client', 'create-client', 'edit-client', 'delete-client',
            'manage-deposit', 'view-deposit', 'create-deposit', 'edit-deposit', 'delete-deposit',
            'manage-withdrawal', 'view-withdrawal', 'create-withdrawal', 'edit-withdrawal', 'delete-withdrawal',
            'manage-invest', 'view-invest', 'create-invest', 'edit-invest', 'delete-invest',
            'manage-techu', 'view-techu', 'create-techu', 'edit-techu', 'delete-techu',
            'manage-salary', 'view-salary', 'create-salary', 'edit-salary', 'delete-salary',
            'manage-self-techu', 'view-self-techu', 'create-self-techu', 'edit-self-techu', 'delete-self-techu',
            'view-report',
            'manage-snduq', 'view-snduq', 'create-snduq', 'edit-snduq', 'delete-snduq',
        ];

        $permissionsRows = array_chunk($permissions, 20);
        return view('backend.pages.roles.create', compact('permissionsRows'));
    }
 
    public function store(CreateRoleRequest $request)
    {
            $role = Role::create(['name' => $request->name]);
            $role->syncPermissions($request->permissions);
            toast()->success('ڕۆڵەکە بە سەرکەوتویی زیاد کرا');
            return redirect()->route('roles.index');
    }

    public function edit(Role $role)
    {
        $permissions
        = [
            'manage-role', 'view-role', 'create-role', 'edit-role', 'delete-role',
            'manage-user', 'view-user', 'create-user', 'edit-user', 'delete-user', 'toggle-user-status',
            'manage-client', 'view-client', 'create-client', 'edit-client', 'delete-client',
            'manage-deposit', 'view-deposit', 'create-deposit', 'edit-deposit', 'delete-deposit',
            'manage-withdrawal', 'view-withdrawal', 'create-withdrawal', 'edit-withdrawal', 'delete-withdrawal',
            'manage-invest', 'view-invest', 'create-invest', 'edit-invest', 'delete-invest',
            'manage-techu', 'view-techu', 'create-techu', 'edit-techu', 'delete-techu',
            'manage-salary', 'view-salary', 'create-salary', 'edit-salary', 'delete-salary',
            'manage-self-techu', 'view-self-techu', 'create-self-techu', 'edit-self-techu', 'delete-self-techu',
            'view-report',
            'manage-snduq', 'view-snduq', 'create-snduq', 'edit-snduq', 'delete-snduq',
        ];
        $permissionsRows = array_chunk($permissions, 20);
        $userPermissions = $role->permissions()->pluck('name')->toArray();
        return view('backend.pages.roles.edit', compact('role','permissionsRows', 'userPermissions'));
    
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
            $role->syncPermissions($request->permissions);
            toast()->success('ڕۆڵەکە بە سەرکەوتویی نوێ کرایەوە');
            return redirect()->route('roles.index');
    }

    public function destroy(Role $role)
    {
        if($role->users->count() > 0){
            toast()->error('ببوورە ناتوانی ئەم ڕۆڵەکە بسریتەوە');
            return redirect()->route('roles.index');
        }
        $role->delete();
        toast()->success('ڕۆڵەکە بە سەرکەوتویی سڕایەوە');
        return redirect()->route('roles.index');
    }
}
