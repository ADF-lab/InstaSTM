<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username'       => 'Admin',
            'fullname'       => 'Admin',
            'nisn'           => '1',
            'email'          => 'admin@admin.com',
            'password'       => bcrypt('password'),
            'remember_token' => Str::random(60),
            'role_id'        => $role->id,
        ]);
    }
}
