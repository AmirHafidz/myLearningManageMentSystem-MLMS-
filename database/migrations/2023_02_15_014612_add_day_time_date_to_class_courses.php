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
        Schema::table('class_courses', function (Blueprint $table) {
            $table->string('day')->after('course_id')->nullable();
            $table->date('start_date')->after('day')->nullable();
            $table->date('end_date')->after('start_date')->nullable();
            $table->time('start_time')->after('end_date')->nullable();
            $table->time('end_time')->after('start_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('class_courses', function (Blueprint $table) {
            $table->dropColumn('day');
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
            $table->dropColumn('start_time');
            $table->dropColumn('end_time');
        });
    }
};
