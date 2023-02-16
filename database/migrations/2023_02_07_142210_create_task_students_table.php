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
        Schema::create('task_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('master_task_id');
            $table->string('student_id')->nullable();
            $table->boolean('is_finish')->default(false);
            $table->date('date_submit')->nullable();
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
        Schema::dropIfExists('task_students');
    }
};
