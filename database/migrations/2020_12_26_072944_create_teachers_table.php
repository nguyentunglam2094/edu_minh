<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->default(null);
            $table->string('avatar')->nullable()->default(null);
            $table->string('phone', 20)->nullable()->default(null);
            $table->date('dob')->nullable()->default(null);
            $table->integer('subject_id')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->integer('city_id')->nullable()->default(null);
            $table->integer('district_id')->nullable()->default(null);
            $table->integer('ward_id')->nullable()->default(null);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('teachers');
    }
}
