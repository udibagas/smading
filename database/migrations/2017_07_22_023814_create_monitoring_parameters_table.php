<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonitoringParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitoring_parameters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20);
            $table->string('description', 100);
            $table->integer('ruang_id');
            $table->float('min_value');
            $table->float('max_value');
            $table->string('unit', 20);
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
        Schema::dropIfExists('monitoring_parameters');
    }
}
