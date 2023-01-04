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
        Permission::create(['name' => 'edit posts']);
        Permission::create(['name' => 'delete posts']);
        Permission::create(['name' => 'publish posts']);
        Permission::create(['name' => 'unpublish posts']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'writer']);
        $role->givePermissionTo('edit posts');

        // or may be done by chaining
        $role = Role::create(['name' => 'moderator'])
            ->givePermissionTo(['publish posts', 'unpublish posts']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
