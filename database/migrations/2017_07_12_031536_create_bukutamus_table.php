<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBukutamusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukutamus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 30);
            $table->string('instansi', 30);
            $table->string('jabatan', 30);
            $table->string('tujuan');
            $table->dateTime('masuk')->nullable();
            $table->dateTime('keluar')->nullable();
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
        Schema::dropIfExists('bukutamus');
    }
}
