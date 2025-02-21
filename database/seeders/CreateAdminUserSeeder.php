<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678')
        ]);
    
        $role = Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);
     
        $user->assignRole($role);

        $permissions = [
            'view dashboard',
            'manage users',
            'manage roles',
            'view expired domains',
            'manage expired domains'
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
                'guard_name' => 'web'
            ]);
        }

        $role->givePermissionTo(Permission::all());
    }
}
