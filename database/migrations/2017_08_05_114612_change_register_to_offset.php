<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeRegisterToOffset extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('modbus_registers', function (Blueprint $table) {
            $table->renameColumn('register', 'offset');
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
            $table->renameColumn('offset', 'register');
        });
    }
}
