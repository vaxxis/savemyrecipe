<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        User::create(array( // demo
        	'name' => 'Vasile Botoroga',
        	'email' => 'demo@example.com',
        	'password' => bcrypt('demo'),
        ));

        User::create(array( // user1
        	'name' => 'Mario Rossi',
        	'email' => 'user1@example.com',
        	'password' => bcrypt('user1'),
        ));

        User::create(array( // user2
        	'name' => 'Mario Bianchi',
        	'email' => 'user2@example.com',
        	'password' => bcrypt('user2'),
        ));

        User::create(array( // user3
        	'name' => 'Gianni Rotonda',
        	'email' => 'user3@example.com',
        	'password' => bcrypt('user3'),
        ));
    }
}
