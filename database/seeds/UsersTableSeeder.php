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

        User::create(array( // demo1
        	'name' => 'Mario Rossi',
        	'email' => 'demo1@example.com',
        	'password' => bcrypt('demo1'),
        ));
    }
}
