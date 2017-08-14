<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteMinMaxValue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('modbus_registers', function (Blueprint $table) {
            $table->dropColumn(['min_value', 'max_value']);
            $table->string('data_type', 10);
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
            $table->decimal('min_value');
            $table->decimal('max_value');
            $table->dropColumn('data_type');
        });
    }
}
