<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Account;
use TCG\Voyager\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Account::create([
            'nisn'           => '1',
        ]);

        User::create([
            'username'       => 'admin',
            'name'       => 'Admin',
            'nisn'           => '1',
            'role_id'		=>'1',
            'email'          => 'admin@admin.com',
            'password'       => bcrypt('password'),
            'remember_token' => Str::random(60),
        ]);
    }
}
