<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle', function (Blueprint $table) {
            $table->integer('Vehicle_Id')->autoIncrement()->index();
            $table->string('Model');
            $table->integer('Year');
            $table->integer('Total_Passenger');
            $table->string('Manufacturer');
            $table->integer('Price');
            $table->string('Vehicle_Type');
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
        Schema::dropIfExists('vehicle');
    }
};
