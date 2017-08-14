<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAlertOnSensor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sensors', function (Blueprint $table) {
            $table->boolean("alert_min")->default(0);
            $table->boolean("alert_max")->default(0);
            $table->boolean("alert_sms")->default(0);
            $table->boolean("alert_email")->default(0);
            $table->boolean("alert_web")->default(0);
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
            $table->dropColumn(['alert_min', 'alert_max', 'alert_sms', 'alert_email', 'alert_web']);
        });
    }
}
