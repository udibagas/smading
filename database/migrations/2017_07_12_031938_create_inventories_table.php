<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_registrasi', 50)->nullable();
            $table->string('skpd', 50);
            $table->string('pemilik', 50);
            $table->integer('gedung_id');
            $table->integer('ruang_id');
            $table->string('posisi', 20);
            $table->string('koneksi_listrik', 20)->nullable();
            $table->string('ip_address', 15)->nullable();
            $table->string('koneksi_lan', 30)->nullable();
            $table->string('merk', 30)->nullable();
            $table->string('model', 30)->nullable();
            $table->string('serial_number', 30)->nullable();
            $table->date('tanggal_penempatan')->nullable();
            $table->date('tanggal_ikatan_pengadaan')->nullable();
            $table->date('tanggal_berakhir_garansi')->nullable();
            $table->date('tanggal_berakhir_sewa')->nullable();
            $table->string('nomor_ikatan_pengadaan', 50)->nullable();
            $table->float('harga_pengadaan')->nullable();
            $table->string('nama_kontak', 20)->nullable();
            $table->string('nomor_kontak', 20)->nullable();
            $table->string('fungsi', 100)->nullable();
            $table->string('status_kepemilikan', 20)->nullable();
            $table->string('kondisi', 20)->nullable();
            $table->string('negara_pembuat', 30)->nullable();
            $table->string('keterangan')->nullable();
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('inventories');
    }
}
