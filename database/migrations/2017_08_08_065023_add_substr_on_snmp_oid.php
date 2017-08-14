<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubstrOnSnmpOid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('snmp_oids', function (Blueprint $table) {
            $table->string('substr_output', 10);
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
            $table->dropColumn('substr_output');
        });
    }
}
