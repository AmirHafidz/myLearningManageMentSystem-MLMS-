<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('course_id');
            $table->string('title');
            $table->string('content');
            $table->date('date_post');
            $table->time('time_post');
            $table->json('file');
            $table->json('image');
            $table->json('video');
            $table->json('other');
            $table->foreign('user_id')->on('users')->references('id')->ondelete('cascade');
            $table->foreign('class_id')->on('master_classes')->references('id')->ondelete('cascade');
            $table->foreign('course_id')->on('master_courses')->references('id')->ondelete('cascade');
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
        Schema::dropIfExists('course_posts');
    }
};
