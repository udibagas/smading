<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUnitOnNmmpOid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('snmp_oids', function (Blueprint $table) {
            $table->string('unit', 15);
            $table->decimal('min_value');
            $table->decimal('max_value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('snmp_oids', function (Blueprint $table) {
            $table->dropColumn(['unit', 'min_value', 'max_value']);
        });
    }
}
