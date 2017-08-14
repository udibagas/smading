<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeWebAccessToNullabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sensors', function (Blueprint $table) {
            $table->string('description')->nullable()->change();
            $table->string('web_access')->nullable()->change();
            $table->string('username', 20)->nullable()->change();
            $table->string('password', 20)->nullable()->change();
            $table->string('code', 20)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sensors', function (Blueprint $table) {
            //
        });
    }
}
