<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffiliatedSocietiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliated_societies', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('code', 15)->nullable();
            $table->string('cnpj', 14)->nullable();
            $table->string('description', 100)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('zip_code', 10)->nullable();
            $table->string('neighborhood', 30)->nullable();
            $table->string('phone', 11)->nullable();
            $table->string('mobile', 11)->nullable();
            $table->string('email', 50)->nullable();

            $table->integer('city_id')->unsigned()->default(1);
            $table->foreign('city_id')->references('id')->on('cities');

            $table->string('comments', 200)->nullable();
  
            $table->timestamps();
            $table->softDeletes();

            $table->index(['code']);
            $table->index(['description']);
            $table->index(['cnpj']);

            $table->index(['code', 'cnpj', 'description']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('affiliated_societies');
    }
}
