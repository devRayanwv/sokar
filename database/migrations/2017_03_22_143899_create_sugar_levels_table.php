<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSugarLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Schema::create('sugar_levels', function (Blueprint $table) {
            $table->increments('id');
            $table->double('value');
            $table->string('note')->nullable();


            $table->integer('timeString_id')->nullable()->unsigned();
            $table->integer('exercise_id')->nullable()->unsigned();
            $table->integer('medicine_id')->nullable()->unsigned();

            $table->foreign('timeString_id')->references('id')->on('times')->onDelete('cascade');
            $table->foreign('exercise_id')->references('id')->on('exercises')->onDelete('cascade');
            $table->foreign('medicine_id')->references('id')->on('medicines')->onDelete('cascade');


            $table->timestamps();
        });
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Schema::dropIfExists('times');
        Schema::dropIfExists('exercises');
        Schema::dropIfExists('medicines');

        Schema::dropIfExists('sugar_levels');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
