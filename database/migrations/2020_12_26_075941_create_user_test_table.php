<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_test', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('test_id');
            $table->integer('answer_corredt')->nullable()->default(0);
            $table->string('result')->nullable()->default(0)->comment('diem dat dc cua de thi');
            $table->integer('times')->nullable()->default(null)->comment('so lan lam bai');
            $table->dateTime('date')->nullable()->default(null)->comment('thoi gian lam bai');
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
        Schema::dropIfExists('user_test');
    }
}
