<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create Roles
        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleEditor = Role::create(['name' => 'editor']);
        $roleUser = Role::create(['name' => 'user']);


        // permission List as Array
        $permissions = [
            // 
            'admin.dashboard',

            // blog permission
            'blog.create',
            'blog.edit',
            'blog.view',
            'blog.delete',
            'blog.approve',

            // blog permission
            'admin.create',
            'admin.edit',
            'admin.view',
            'admin.delete',
            'admin.approve',

            // blog permission
            'role.create',
            'role.edit',
            'role.view',
            'role.delete',
            'role.approve',

            // Profile permission
            'profile.view',
            'profile.edit',


        ];

        // Create and Assign permission 

        for ($i = 0; $i < count($permissions); $i++) {
            $permission = Permission::create(['name' => $permissions[$i]]);

            $roleSuperAdmin->givePermissionTo($permission);
            $permission->assignRole($roleSuperAdmin);

        }
    }
}
