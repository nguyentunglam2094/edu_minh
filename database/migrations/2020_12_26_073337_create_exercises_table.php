<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercises', function (Blueprint $table) {
            $table->id();
            $table->integer('exercises_type_id');
            $table->string('avatar')->nullable()->default(null);
            $table->string('image_answer')->nullable()->default(null);
            $table->string('image_question')->nullable()->default(null);
            $table->text('question')->nullable()->default(null);
            $table->text('answer')->nullable()->default(null);
            $table->integer('selected_question')->comment('1-A, 2-B, 3-C, 4-D');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exercises');
    }
}
