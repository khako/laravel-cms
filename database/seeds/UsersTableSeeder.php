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
        // reset the users table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        // generate 3 users/authors
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john@doe.fr',
                'password' => bcrypt('secret')
            ],
            [
                'name' => 'Tuan Cezil',
                'email' => 'illuminability@entoplastron.edu',
                'password' => bcrypt('secret')
            ],
            [
                'name' => 'Aida Mcnelis',
                'email' => 'inkstone@corp.net',
                'password' => bcrypt('secret')
            ]
        ]);

    }
}
