<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAverageOnLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sensor_log15s', function (Blueprint $table) {
            $table->decimal('avg');
        });

        Schema::table('sensor_log_per_days', function (Blueprint $table) {
            $table->decimal('avg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sensor_log15s', function (Blueprint $table) {
            $table->dropColumn(['avg']);
        });

        Schema::table('sensor_log_per_days', function (Blueprint $table) {
            $table->dropColumn(['avg']);
        });
    }
}
