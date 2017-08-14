<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMonitoringParameterIdOnLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sensor_log15s', function (Blueprint $table) {
            $table->integer('monitoring_parameter_id');
        });

        Schema::table('sensor_log_per_days', function (Blueprint $table) {
            $table->integer('monitoring_parameter_id');
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
            $table->dropColumn('monitoring_parameter_id');
        });

        Schema::table('sensor_log_per_days', function (Blueprint $table) {
            $table->dropColumn('monitoring_parameter_id');
        });
    }
}
