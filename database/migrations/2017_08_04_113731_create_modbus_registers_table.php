<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModbusRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modbus_registers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('appliance_id');
            $table->integer('register');
            $table->string('description', 50);
            $table->string('conversion', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modbus_registers');
    }
}
