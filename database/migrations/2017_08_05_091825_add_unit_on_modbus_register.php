<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUnitOnModbusRegister extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('modbus_registers', function (Blueprint $table) {
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
        Schema::table('modbus_registers', function (Blueprint $table) {
            $table->dropColumn(['unit', 'min_value', 'max_value']);
        });
    }
}
