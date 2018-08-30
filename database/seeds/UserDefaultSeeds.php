<?php

use Illuminate\Database\Seeder;

class UserDefaultSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
            'user_type' => 'M',
        ]);
    }
}
