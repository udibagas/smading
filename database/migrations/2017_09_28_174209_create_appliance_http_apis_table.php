<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplianceHttpApisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appliance_http_apis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('appliance_id');
            $table->integer('monitoring_parameter_id');
            $table->string('url');
            $table->string('description', 50);
            $table->string('unit', 15);
            $table->string('data_type', 10);
            $table->boolean('monitor')->default(1);
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
        Schema::dropIfExists('appliance_http_apis');
    }
}
