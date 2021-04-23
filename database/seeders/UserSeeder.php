<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $adminRole = Role::where('name', 'admin')->first();
        $admin = User::create([
            'name' => 'Admin',
            'username' => 'Admin',
            'phone' => '99999999',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $admin->roles()->attach($adminRole);
    }
}
