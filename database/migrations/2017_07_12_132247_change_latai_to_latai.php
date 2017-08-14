<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeLataiToLatai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ruangs', function (Blueprint $table) {
            $table->renameColumn('latai', 'lantai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ruangs', function (Blueprint $table) {
            $table->renameColumn('lantai', 'latai');
        });
    }
}
