<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RBAC\Permissions\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();       
        Role::create(['name' =>'admin']); 
    }
}