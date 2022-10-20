<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $permissions = [
        //     'view_users',
        //     'add_users',
        //     'edit_users',
        //     'delete_users',

        //     'view_admins',
        //     'add_admins',
        //     'delete_admins',
        //     'edit_admins'
        // ];

        // foreach($permissions as $permission) {
        //     $permission = Permission::create(['name' => $permission]);
        // }
        // $role = Role::create(['name' => 'admins']);
        // $role->syncPermissions($permissions);

        // $role = Role::create(['name' => 'admins']);
        // $role->syncPermissions([
        //     'view_users',
        //     'add_users',
        //     'edit_users',
        //     'delete_users',

        //     'view_admins',
        //     'add_admins',
        //     'delete_admins',
        //     'edit_admins'
        // ]);

        // $role = Role::create(['name' => 'user']);
        // $role->syncPermissions([
        //     'view_users',
        //     'add_users',
        //     'edit_users',
        //     'delete_users',
        // ]);
    }
}
