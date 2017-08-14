<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemeliharaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemeliharaans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inventory_id');
            $table->float('biaya')->nullable();
            $table->float('pajak_biaya')->nullable();
            $table->string('jenis', 20);
            $table->string('ikatan_perjanjian', 30)->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->date('tanggal_selanjutnya')->nullable();
            $table->date('tanggal_berakhir_garansi')->nullable();
            $table->string('kondisi_setelah', 30)->nullable();
            $table->string('catatan')->nullable();
            $table->string('foto', 100)->nullable();
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
        Schema::dropIfExists('pemeliharaans');
    }
}
