<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMinMaxValueOnMoitoringParameter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('monitoring_parameters', function (Blueprint $table) {
            $table->decimal('min_value');
            $table->decimal('max_value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('monitoring_parameters', function (Blueprint $table) {
            $table->dropColumn(['min_value', 'max_value']);
        });
    }
}
