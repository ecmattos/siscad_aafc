<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatrimonialFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patrimonial_files', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('patrimonial_id')->unsigned()->default(1);
            $table->foreign('patrimonial_id')->references('id')->on('patrimonials');

            $table->string('extension', 5)->nullable();
            $table->string('description', 50)->nullable();
            
            $table->timestamps();
            $table->softDeletes();

            $table->index(['patrimonial_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patrimonial_files');
    }
}
