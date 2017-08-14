<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSensorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20);
            $table->string('code', 10);
            $table->string('description');
            $table->string('position');
            $table->string('ip_address', 15);
            $table->string('port', 6);
            $table->string('access', 10); // modbus atau snmp
            $table->string('command');
            $table->decimal('min_value');
            $table->decimal('max_value');
            $table->string('web_access');
            $table->string('username', 20);
            $table->string('password', 20);
            $table->integer('ruang_id');
            $table->integer('gedung_id');
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
        Schema::dropIfExists('sensors');
    }
}
