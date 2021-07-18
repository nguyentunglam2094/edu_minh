<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePushUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('push_users', function (Blueprint $table) {
            $table->id();
            $table->integer('push_id')->nullable()->default(0);
            $table->integer('user_id')->nullable()->default(0);
            $table->integer('read')->nullable()->default(0);
            $table->integer('user_type')->nullable()->comment('1 admin, 2 student');
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
        Schema::dropIfExists('push_users');
    }
}
