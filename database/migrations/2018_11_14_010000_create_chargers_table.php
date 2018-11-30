<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChargersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chargers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->decimal('charge_rate',8,2);
            $table->decimal('flat_rate',8,2)->nullable();
            $table->decimal('fee1',8,2)->nullable();
            $table->decimal('fee2',8,2)->nullable();
            $table->decimal('fee1_hr',8,3)->nullable();
            $table->decimal('fee1_kwh',8,2)->nullable();
            $table->string('name',255);
            $table->smallInteger('options')->nullable();
            $table->smallInteger('feeoption')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chargers');
    }
}
