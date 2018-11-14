<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cost_sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('charge_session_id');
            $table->foreign('charge_session_id')->references('id')->on('charge_sessions');
            $table->unsignedInteger('cost_id');
            $table->foreign('cost_id')references('id')-on('costs');
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
        Schema::dropIfExists('cost_sessions');
    }
}
