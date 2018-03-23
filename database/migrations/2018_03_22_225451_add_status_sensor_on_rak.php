<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusSensorOnRak extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('raks', function (Blueprint $table) {
            $table->decimal('suhu_depan')->nullable();
            $table->decimal('suhu_belakang')->nullable();
            $table->decimal('lembab_depan')->nullable();
            $table->decimal('lembab_belakang')->nullable();
            $table->decimal('arus_ets')->nullable();
            $table->decimal('arus_ups')->nullable();
            $table->boolean('pintu_depan')->nullable();
            $table->boolean('pintu_belakang')->nullable();
            $table->boolean('gas_depan')->nullable();
            $table->boolean('gas_belakang')->nullable();
            $table->boolean('compressor')->nullable();
            $table->boolean('fan')->nullable();
            $table->boolean('heater')->nullable();
            $table->boolean('hplp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('raks', function (Blueprint $table) {
            $table->dropColumn([
                'suhu_depan',
                'suhu_belakang',
                'lembab_depan',
                'lembab_belakang',
                'pintu_depan',
                'pintu_belakang',
                'gas_depan',
                'gas_belakang',
                'compressor',
                'fan',
                'heater',
                'hplp',
                'arus_ets',
                'arus_ups'
            ]);
        });
    }
}
