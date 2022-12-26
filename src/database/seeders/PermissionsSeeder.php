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
        $this->CreateUserPermissions();
        $this->CreateDriverPermissions();
    }

    public function SettingUpPermissions():void
    {
        $permissions = [
            'role_access',
            'role_show',
            'role_create',
            'role_edit',
            'role_delete',

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

    public function CreateUserPermissions():void
    {
        $Permissions = [
            'permission_access',
        ];

        $User = Role::create(['name' => 'User']);

        foreach ($Permissions as $permission) {
            $User->givePermissionTo($permission);
        }

        $user = User::factory()->create([
            'name' => 'Example Admin User',
            'email' => 'admin2@example.com',
        ]);

        $user->assignRole($User);
    }

    public function CreateDriverPermissions():void
    {
        $Permissions = [
            'permission_access',
        ];

        $Driver = Role::create(['name' => 'Driver']);

        foreach ($Permissions as $permission) {
            $Driver->givePermissionTo($permission);
        }

        $user = User::factory()->create([
            'name' => 'Example Admin User',
            'email' => 'admin1@example.com',
        ]);

        $user->assignRole($Driver);
    }
}
