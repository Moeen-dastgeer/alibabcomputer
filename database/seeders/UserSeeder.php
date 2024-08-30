<?php

namespace Database\Seeders;
// use App\Models\Admin\User;
use App\Models\Admin\Team;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $admin = Team::create([
            'name'=>'Muhammad Shoaib',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('12345678')
        ]);

        $manager = Team::create([
            'name'=>'Baber Mujahid',
            'email'=>'baber@gmail.com',
            'password'=>bcrypt('12345678')
        ]);

        
        $admin_role = Role::create(['name' => 'Admin']);
        $manager_role = Role::create(['name' => 'Manager']);

        $permission = Permission::create(['name' => 'General access']);
        $manager->assignRole($manager_role);
        $manager_role->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'Role access']);
        $permission = Permission::create(['name' => 'Role edit']);
        $permission = Permission::create(['name' => 'Role create']);
        $permission = Permission::create(['name' => 'Role delete']);


        $permission = Permission::create(['name' => 'User access']);
        $permission = Permission::create(['name' => 'User edit']);
        $permission = Permission::create(['name' => 'User create']);
        $permission = Permission::create(['name' => 'User delete']);

        $permission = Permission::create(['name' => 'Contact access']);
        $permission = Permission::create(['name' => 'Contact delete']);
        

        $admin->assignRole($admin_role);
        $admin_role->givePermissionTo(Permission::all());
    }
}
