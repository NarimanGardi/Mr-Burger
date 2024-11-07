<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Role::where('name', 'Admin')->first() === null) {
            $admin = Role::create(['name' => 'Admin']);
        } else {
            $admin = Role::where('name', 'Admin')->first();
        }

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

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(['name' => $permission]);
        }

        $admin->givePermissionTo(Permission::all());
    }
}
