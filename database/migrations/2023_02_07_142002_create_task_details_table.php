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
        Schema::create('task_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('master_task_id');
            $table->string('description_one')->nullable();
            $table->string('description_two')->nullable();
            $table->json('file')->nullable();
            $table->json('image')->nullable();
            $table->json('video')->nullable();
            $table->json('other')->nullable();
            $table->foreign('master_task_id')->on('master_tasks')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('task_details');
    }
};
