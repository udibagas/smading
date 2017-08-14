<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SesuaikanTableSensors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sensors', function (Blueprint $table) {
            $table->dropColumn([
                'protocol', 'port', 'command', 'min_value', 'max_value',
                'unit', 'alert_min', 'alert_max',
                'alert_sms', 'alert_email', 'alert_web'
            ]);

            $table->integer('appliance_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sensors', function (Blueprint $table) {
            $table->string('protocol');
            $table->string('port');
            $table->string('command');
            $table->string('min_value');
            $table->string('max_value');
            $table->string('unit');
            $table->string('alert_min');
            $table->string('alert_max');
            $table->string('alert_sms');
            $table->string('alert_email');
            $table->string('alert_web');

            $table->dropColumn('appliance_id');
        });
    }
}
