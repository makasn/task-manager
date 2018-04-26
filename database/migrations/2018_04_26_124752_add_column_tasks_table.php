<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->text('description')->nullable()->default(NULL)->after('name');
            $table->integer('status')->default(0)->after('description');
            $table->integer('hours')->nullable()->default(NULL)->after('status');
            $table->dateTime('start_date')->nullable()->default(NULL)->after('hours');
            $table->dateTime('end_date')->nullable()->default(NULL)->after('start_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('status');
            $table->dropColumn('hours');
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
        });
    }
}
