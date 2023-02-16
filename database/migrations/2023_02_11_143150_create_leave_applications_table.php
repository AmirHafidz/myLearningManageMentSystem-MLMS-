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
        Schema::create('leave_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('description_one')->nullable();
            $table->string('description_two')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->json('support_file');
            $table->unsignedBigInteger('status_id')->default(1);
            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade');
            $table->foreign('status_id')->on('leave_statuses')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('leave_applications');
    }
};
