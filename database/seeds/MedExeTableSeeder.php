<?php

use Illuminate\Database\Seeder;

class MedExeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicines')->insert(
            $entries = [
                [
                    'name' => 'Metformin',
                    'dose' => '500 mg',
                    'note' => 'Take in divided doses 2 to 3 times a day with meals'
                ]
            ]
        );
        DB::table('exercises')->insert(
            $entries = [
                [
                    'name' => 'Walking',
                    'duration' => 30
                ],
                [
                    'name' => 'Biking',
                    'duration' => 20
                ]
            ]
        );

        DB::table('times')->insert(
            $entries = [
                ['timeString' => 'Fasting'],
                ['timeString' => 'Before Lunch'],
                ['timeString' => 'After Lunch'],
                ['timeString' => 'Before Dinner'],
                ['timeString' => 'After Dinner']
            ]
        );


    }
}
