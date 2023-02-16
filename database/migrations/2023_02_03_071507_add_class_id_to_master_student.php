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
        Schema::table('master_students', function (Blueprint $table) {
            $table->unsignedBigInteger('class_id')->after('user_id');
            $table->foreign('class_id')->on('master_classes')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('master_students', function (Blueprint $table) {
            $table->dropColumn('class_id');
        });
    }
};
