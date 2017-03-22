<?php

use Illuminate\Database\Seeder;

class SugarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sugar_levels')->insert(
            $entries = [
                [
                    'value' => 5.5,
                    'timeOfTest' => 1,
                    'medicine_id' => null,
                    'exercise_id' => null,
                ],
                [
                    'value' => 7.9,
                    'timeOfTest' => 1,
                    'medicine_id' => null,
                    'exercise_id' => null,
                ],
                [
                    'value' => 4.3,
                    'timeOfTest' => 1,
                    'medicine_id' => null,
                    'exercise_id' => null,
                ],
                [
                    'value' => 6.2,
                    'timeOfTest' => 1,
                    'medicine_id' => null,
                    'exercise_id' => null,
                ],
                [
                    'value' => 7.5,
                    'timeOfTest' => 1,
                    'medicine_id' => null,
                    'exercise_id' => null,
                ],
                [
                    'value' => 8.9,
                    'timeOfTest' => 1,
                    'medicine_id' => null,
                    'exercise_id' => null,
                ],
                [
                    'value' => 4.7,
                    'timeOfTest' => 1,
                    'medicine_id' => null,
                    'exercise_id' => null,
                ],
                [
                    'value' => 5.5,
                    'timeOfTest' => 1,
                    'medicine_id' => 1,
                    'exercise_id' => null,
                ],
                [
                    'value' => 3.9,
                    'timeOfTest' => 1,
                    'medicine_id' => 1,
                    'exercise_id' => null,
                ],
                [
                    'value' => 4.1,
                    'timeOfTest' => 1,
                    'medicine_id' => 1,
                    'exercise_id' => null,
                ],
                [
                    'value' => 4.8,
                    'timeOfTest' => 1,
                    'medicine_id' => 1,
                    'exercise_id' => null,
                ],
                [
                    'value' => 5.2,
                    'timeOfTest' => 1,
                    'medicine_id' => 1,
                    'exercise_id' => null,
                ],
                [
                    'value' => 5.3,
                    'timeOfTest' => 1,
                    'medicine_id' => 1,
                    'exercise_id' => null,
                ],
                [
                    'value' => 6.1,
                    'timeOfTest' => 1,
                    'medicine_id' => 1,
                    'exercise_id' => null,
                ],
                [
                    'value' => 5.7,
                    'timeOfTest' => 1,
                    'medicine_id' => null,
                    'exercise_id' => 1,
                ],
                [
                    'value' => 6.9,
                    'timeOfTest' => 1,
                    'medicine_id' => null,
                    'exercise_id' => 1,
                ],
                [
                    'value' => 7.1,
                    'timeOfTest' => 1,
                    'medicine_id' => null,
                    'exercise_id' => 1,
                ],
                [
                    'value' => 6.6,
                    'timeOfTest' => 1,
                    'medicine_id' => null,
                    'exercise_id' => 1,
                ],
                [
                    'value' => 5.5,
                    'timeOfTest' => 1,
                    'medicine_id' => null,
                    'exercise_id' => 1,
                ],
                [
                    'value' => 7.8,
                    'timeOfTest' => 1,
                    'medicine_id' => null,
                    'exercise_id' => 1,
                ],
                [
                    'value' => 7.3,
                    'timeOfTest' => 1,
                    'medicine_id' => null,
                    'exercise_id' => 1,
                ]
            ]
        );
    }
}
