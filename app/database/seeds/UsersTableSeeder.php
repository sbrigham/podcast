<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
        Eloquent::unguard();

        // Create admin user
        User::create([
            'username' => 'admin',
            'password' => Hash::make('8d24c89148'),
            'email' => 'sdbrigha@buffalo.edu',
            'remember_token' => Hash::make('random')
        ]);
	}

}