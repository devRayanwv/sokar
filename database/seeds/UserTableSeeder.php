<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            $users = [
                [
                    'name' => 'Rayan Alamer',
                    'email' => 'admin@admin.com',
                    'password' => bcrypt('123456')
                ],
                [
                    'name' => 'Ahmed',
                    'email' => 'user@user.com',
                    'password' => bcrypt('123456')
                ]
            ]
        );

        $user = \App\User::findOrFail(1);
        $user->attachRole(1);

        $user = \App\User::findOrFail(2);
        $user->attachRole(2);
    }
}
