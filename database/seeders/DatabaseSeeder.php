<?php

namespace Database\Seeders;
use Illuminate\Database\Eloquent\Model;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(PermissionTableSeeder::class);
        $user = User::create([
            'name' => "Admin",
            'email' => "son1669063793@gmail.com",
            'password' => Hash::make("123123123"),
        ]);
        $user->assignRole(['3']);

        $role = Role::create(['name' => 'Super-Admin']);
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'User']);
    
        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
        Model::reguard();
    }
}