<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\PermissionServiceProvider;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();
        $permissions = [
            'give vote',
            'view candidate',
            'view vote results',
            'add user',
            'edit user',
            'delete user',
            'add candidates',
            'delete candidates',
            'edit candidates',
            'view audit logs',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $voterRole = Role::firstOrCreate(['name' => 'voter']);

        $adminRole->syncPermissions(Permission::all());

        $voterRole->givePermissionTo([
            'give vote',
            'view candidate',
            'view vote results',
        ]);
    }
}
