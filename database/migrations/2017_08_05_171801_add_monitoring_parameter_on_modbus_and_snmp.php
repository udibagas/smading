<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMonitoringParameterOnModbusAndSnmp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('modbus_registers', function (Blueprint $table) {
            $table->integer('monitoring_parameter_id');
        });

        Schema::table('snmp_oids', function (Blueprint $table) {
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
        Schema::table('modbus_registers', function (Blueprint $table) {
            $table->dropColumn('monitoring_parameter_id');
        });

        Schema::table('snmp_oids', function (Blueprint $table) {
            $table->dropColumn('monitoring_parameter_id');
        });
    }
}
