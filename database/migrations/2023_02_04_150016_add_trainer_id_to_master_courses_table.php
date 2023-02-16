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
        Schema::table('master_courses', function (Blueprint $table) {
            $table->unsignedBigInteger('trainer_id')->nullable();
            $table->foreign('trainer_id')->on('master_trainers')->references('id')->nullOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('master_courses', function (Blueprint $table) {
            $table->dropColumn('trainer_id');
        });
    }
};
