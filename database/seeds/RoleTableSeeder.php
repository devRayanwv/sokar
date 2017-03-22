<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
            $roles = [
                [
                    'name' => 'admin',
                    'display_name' => 'Admin',
                    'description' => ''
                ],
                [
                    'name' => 'user',
                    'display_name' => 'User',
                    'description' => ''
                ],
            ]
        );
    }
}
