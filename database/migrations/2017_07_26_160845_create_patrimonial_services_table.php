<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatrimonialServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patrimonial_services', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('patrimonial_id')->unsigned()->default(1);
            $table->foreign('patrimonial_id')->references('id')->on('patrimonials');

            $table->integer('patrimonial_intervention_type_id')->unsigned()->default(1);
            $table->foreign('patrimonial_intervention_type_id')->references('id')->on('patrimonial_intervention_types');

            $table->integer('service_id')->unsigned()->default(1);
            $table->foreign('service_id')->references('id')->on('services');

            $table->integer('provider_id')->unsigned()->default(1);
            $table->foreign('provider_id')->references('id')->on('providers');

            $table->date('intervention_date')->nullable();
            $table->date('invoice_date')->nullable();
            $table->string('purchase_process', 25)->nullable();
            $table->string('invoice', 15)->nullable();
            $table->float('purchase_value', 15, 2)->default(0);
            $table->float('purchase_qty', 6, 2)->default(0);
            
            $table->timestamps();
            $table->softDeletes();

            $table->index(['patrimonial_id']);
            $table->index(['service_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('patrimonial_services');
    }
}
