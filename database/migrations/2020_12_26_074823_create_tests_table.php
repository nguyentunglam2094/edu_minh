<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->integer('subject_id');
            $table->integer('class_id');
            $table->string('title')->nullable()->default(null);
            $table->string('file_pdf')->nullable()->default(null);
            $table->integer('question_number')->nullable()->default(0);
            $table->integer('min')->nullable()->default(null)->comment('thoi gian lam bai');
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
        Schema::dropIfExists('tests');
    }
}
