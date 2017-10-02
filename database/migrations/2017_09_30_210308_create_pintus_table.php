<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePintusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pintus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gedung_id');
            $table->smallInteger('lantai');
            $table->integer('ruang_id');
            $table->string('name', 30);
            $table->string('code', 10);
            $table->string('description');
            $table->string('ip_address', 15);
            $table->string('username', 20);
            $table->string('password', 20);
            $table->boolean('status')->default(1);
            $table->dateTime('last_access_time')->nullable();
            $table->string('last_access_by')->nullable();
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
        Schema::dropIfExists('pintus');
    }
}
