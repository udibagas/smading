<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMonitorOnModbusAndSnmp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('modbus_registers', function (Blueprint $table) {
            $table->boolean('monitor')->default(1);
        });

        Schema::table('snmp_oids', function (Blueprint $table) {
            $table->boolean('monitor')->default(1);
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
            $table->dropColumn('monitor');
        });

        Schema::table('snmp_oids', function (Blueprint $table) {
            $table->dropColumn('monitor');
        });
    }
}
