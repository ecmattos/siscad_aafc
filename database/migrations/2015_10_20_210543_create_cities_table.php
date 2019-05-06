<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('region_id')->unsigned()->default(1);
            $table->foreign('region_id')->references('id')->on('regions');

            $table->integer('state_id')->unsigned()->default(1);
            $table->foreign('state_id')->references('id')->on('states');

            $table->string('description', 70);

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
        Schema::drop('cities');
    }
}
