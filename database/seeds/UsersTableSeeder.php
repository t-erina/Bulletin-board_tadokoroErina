<?php

use App\Models\Users\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'username' => '加藤',
                'email' => 'katou@example.com',
                'password' => Hash::make('testtest'),
                'admin_role' => '1',
            ],
            [
                'username' => '望月',
                'email' => 'mochiduki@example.com',
                'password' => Hash::make('testtest'),
                'admin_role' => '1',
            ],
        ]);
    }
}
