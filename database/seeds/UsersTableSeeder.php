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
        	'name' => 'Mario Stronati',
            'slug' => 'mariostronati',
        	'email' => 'user@example.com',
        	'password' => bcrypt('user'),
        ));

        User::create(array( // user1
        	'name' => 'Mario Rossi',
            'slug' => 'mariorossi',
        	'email' => 'user1@example.com',
        	'password' => bcrypt('user1'),
        ));

        User::create(array( // user2
        	'name' => 'Mario Bianchi',
            'slug' => 'mariobianchi',
        	'email' => 'user2@example.com',
        	'password' => bcrypt('user2'),
        ));

        User::create(array( // user3
        	'name' => 'Mario Rotonda',
            'slug' => 'giannirotonda',
        	'email' => 'user3@example.com',
        	'password' => bcrypt('user3'),
        ));
    }
}
