<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdMonitoringGroupIdOnMonitParam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('monitoring_parameters', function (Blueprint $table) {
            $table->integer('monitoring_group_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('monitoring_parameters', function (Blueprint $table) {
            $table->dropColumn('monitoring_group_id');
        });
    }
}
