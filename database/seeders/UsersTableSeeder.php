<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\RBAC\Permissions\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();
        $adminRole=Role::where('name','admin')->first();
        $user=User::create([
            'name'=>'Admin',
            'phone_number'=>'909509578',
            'email' => 'super@gmail.com',
            'password'=>Hash::make('@admin@admin@')
        ]);
        $user->roles()->attach($adminRole);
    }
}
