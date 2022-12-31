<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $Admin = Role::create(['name' => 'Admin']);
        $this->SettingUpPermissions();
        $UserPermissions = [
            'role_access',
            'role_show',
            'role_create',
            'role_edit',
            'role_delete',
            'role_grant',
            'role_revoke',
        ];
        $this->CreateNewRole('User', $UserPermissions);

        $DriverPermissions = [
            'role_access',
            'role_show',
            'role_create',
            'role_edit',
            'role_delete',
            'role_grant',
            'role_revoke',
        ];
        $this->CreateNewRole('Driver', $DriverPermissions);
    }

    public function CreateNewRole($roleName , $Permissions):void
    {
        $role = Role::create(['name' => $roleName]);

        foreach ($Permissions as $permission) {
            $role->givePermissionTo($permission);
        }

        $user = User::factory()->create([
            'name' => 'Example Admin User',
            'email' => $roleName . '@example.com',
        ]);

        $user->assignRole($role);
    }

    public function SettingUpPermissions():void
    {
        $permissions = [
            'role_access',
            'role_show',
            'role_create',
            'role_edit',
            'role_delete',
            'role_grant',
            'role_revoke',

            'permission_access',
            'permission_show',
            'permission_create',
            'permission_edit',
            'permission_delete',

            'user_access',
            'user_show',
            'user_create',
            'user_edit',
            'user_delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
