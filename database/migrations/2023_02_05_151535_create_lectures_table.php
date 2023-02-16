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
        Schema::create('lectures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trainer_id')->nullable();
            $table->unsignedBigInteger('class_id')->nullable();
            $table->string('title');
            $table->text('description_one')->nullable();
            $table->text('description_two')->nullable();
            $table->json('file')->nullable();
            $table->json('photo')->nullable();
            $table->json('video')->nullable();
            $table->foreign('trainer_id')->on('master_trainers')->references('id')->nullOnDelete();
            $table->foreign('class_id')->on('master_classes')->references('id')->nullOnDelete();
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
        Schema::dropIfExists('lectures');
    }
};
