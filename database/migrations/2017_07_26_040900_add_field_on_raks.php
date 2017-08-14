<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldOnRaks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('raks', function (Blueprint $table) {
            $table->string('dimensi', 20);
            $table->integer('kapasitas');
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
            $table->dropColumn(['dimensi', 'kapasitas']);
        });
    }
}
