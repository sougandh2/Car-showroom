<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarspecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carspecs', function (Blueprint $table) {
            $table->id();
            $table->integer('car_id');
            $table->string('hp');
            $table->string('mileage');
            $table->string('air_bags');
            $table->string('type');
            $table->string('fuel');
            $table->string('cover');
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
        Schema::dropIfExists('carspecs');
    }
}
