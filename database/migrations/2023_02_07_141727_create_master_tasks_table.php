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
        Schema::create('master_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trainer_id');
            $table->unsignedBigInteger('class_id');
            $table->string('title');
            $table->date('date_start');
            $table->date('date_end');
            $table->time('time_start');
            $table->time('time_end');
            $table->foreign('trainer_id')->on('master_trainers')->references('id')->onDelete('cascade');
            $table->foreign('class_id')->on('master_classes')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('master_tasks');
    }
};
