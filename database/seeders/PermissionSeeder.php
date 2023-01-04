<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::firstOrCreate(['name' => 'edit posts']);
        Permission::firstOrCreate(['name' => 'delete posts']);
        Permission::firstOrCreate(['name' => 'publish posts']);
        Permission::firstOrCreate(['name' => 'unpublish posts']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::firstOrCreate(['name' => 'writer']);
        $role->givePermissionTo('edit posts');

        // or may be done by chaining
        $role = Role::firstOrCreate(['name' => 'moderator'])
            ->givePermissionTo(['publish posts', 'unpublish posts']);

        $role = Role::firstOrCreate(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
