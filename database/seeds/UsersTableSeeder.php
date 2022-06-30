<?php

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
	    DB::table('users')->insert([
	    'admin'    => 1,
            'name'     => 'Petro Karpiuk',
            'email'    => 'petro@test.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
