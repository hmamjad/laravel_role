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

            // dashboard permission
            [
                'group_name' => 'dashboard',
                'permissions' => ['dashboard.view', 'dashboard.edit'],
            ],


           

            // blog permission
            [
                'group_name' => 'blog',
                'permissions' => [
                    'blog.create',
                    'blog.edit',
                    'blog.view',
                    'blog.delete',
                    'blog.approve',
                ],
            ],



            // blog permission
            [
                'group_name' => 'admin',
                'permissions' => [
                    'admin.create',
                    'admin.edit',
                    'admin.view',
                    'admin.delete',
                    'admin.approve',
                ],
            ],


            // blog permission
            [
                'group_name' => 'role',
                'permissions' => [
                    'role.create',
                    'role.edit',
                    'role.view',
                    'role.delete',
                    'role.approve',
                ],
            ],


            // Profile permission
            [
                'group_name' => 'profile',
                'permissions' => [
                    'profile.view',
                    'profile.edit',
                ],
            ],



        ];


        // Create and Assign permission 
        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_name'];

            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {

                $permission = Permission::create([
                    'name' => $permissions[$i]['permissions'][$j],
                    'group_name' => $permissionGroup,
                ]);

                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }
        }
    }
}
