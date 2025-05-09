<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        $user = User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
        ]);


        $admin->assignRole('admin');
        $user->assignRole('user');


        $adminRole = Role::findByName('admin');
        $adminPermissions = Permission::all();
        $adminRole->syncPermissions($adminPermissions);


        $userRole = Role::findByName('user');
        $userPermissions = Permission::whereIn('name', ['read', 'create'])->get();
        $userRole->syncPermissions($userPermissions);
    }
}
