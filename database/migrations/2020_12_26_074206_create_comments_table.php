<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('object_id')->nullable()->default(null)->comment('id cua bai tap, hoac id cua bai test');
            $table->integer('object_type')->nullable()->default(null)->comment('type bang 1 la id cua bai test, type bang 2 la id cua bai tap');
            $table->text('comment');
            $table->integer('parent_id')->nullable()->default(null)->comment('neu la tra loi comment thi co id o day');
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
        Schema::dropIfExists('comments');
    }
}
