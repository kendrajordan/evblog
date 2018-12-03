<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarChargerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_charger', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('user_id');
          $table->foreign('user_id')->references('id')->on('users');
          $table->unsignedInteger('car_id');
          $table->foreign('car_id')->references('id')->on('cars');
          $table->decimal('vehicle_battery_capacity',8,2)->references('battery_capacity')->on('cars');
          $table->decimal('vehicle_charge_rate',8,2);
          $table->unsignedInteger('charger_id');
          $table->foreign('charger_id')->references('id')->on('chargers');
          $table->decimal('charger_charge_rate',8,2);
          $table->decimal('flat_rate',8,2)->nullable();
          $table->decimal('fee1',8,2)->nullable();
          $table->decimal('fee2',8,2)->nullable();
          $table->decimal('fee_time',8,3)->nullable();
          $table->decimal('fee1_kwh',8,2)->nullable();
          $table->smallInteger('options')->nullable();
          $table->smallInteger('feeoption')->nullable();
          $table->datetime('start');
          $table->datetime('end')->nullable();
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
        Schema::dropIfExists('car_charger');
    }
}
