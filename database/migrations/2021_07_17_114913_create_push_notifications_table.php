<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePushNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('push_notifications', function (Blueprint $table) {
            $table->id();
            $table->string('title', 191)->nullable()->default(null);
            $table->text('content')->nullable()->default(null);
            $table->integer('user_id')->unsigned()->nullable()->default(null);
            $table->integer('sender_id')->unsigned()->nullable()->default(null);
            $table->text('data')->nullable()->default(null);
            $table->integer('status')->unsigned()->nullable()->default(null);
            $table->integer('reference_id')->unsigned()->nullable()->default(null);
            $table->integer('type')->unsigned()->nullable()->default(null)->comment('1 test id, 2 exercire id');
            $table->integer('source')->nullable()->default(null)->comment('1 admin, 2 student');
            $table->integer('source_to')->nullable()->default(null)->comment('1 admin, 2 student');
            $table->text('json_push')->nullable()->default(null);
            $table->string('screen', 191)->nullable()->default(null);
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
        Schema::dropIfExists('push_notifications');
    }
}
