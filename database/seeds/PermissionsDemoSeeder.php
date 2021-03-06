<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'writer']);
        $role1->givePermissionTo('edit articles');
        $role1->givePermissionTo('delete articles');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('publish articles');
        $role2->givePermissionTo('unpublish articles');

        $role3 = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = Factory(App\Models\User::class)->create([
            'name' => 'testuser2',
            'email' => 'testuser2@test.com',
        ]);
        $user->assignRole($role1);

        $user = Factory(App\Models\User::class)->create([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
        ]);
        $user->assignRole($role2);

        $user = Factory(App\Models\User::class)->create([
            'name' => 'Super-Admin User',
            'email' => 'superadmin@test.com',
        ]);
        $user->assignRole($role3);
    }    
}
