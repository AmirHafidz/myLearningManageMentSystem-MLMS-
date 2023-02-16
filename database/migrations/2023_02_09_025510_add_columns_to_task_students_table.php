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
        Schema::table('task_students', function (Blueprint $table) {
            $table->boolean('approved')->after('is_finish')->nullable();
            $table->json('file_submitted')->after('approved')->nullable();
            $table->integer('mark')->after('file_submitted')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task_students', function (Blueprint $table) {
            $table->dropColumn('approved');
            $table->dropColumn('file_submitted');
            $table->dropColumn('mark');
        });
    }
};
