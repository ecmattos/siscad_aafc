<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatrimonialMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patrimonial_materials', function (Blueprint $table) {
            $table->integer('patrimonial_id')->unsigned()->default(1);
            $table->foreign('patrimonial_id')->references('id')->on('patrimonials');

            $table->integer('patrimonial_intervention_type_id')->unsigned()->default(1);
            $table->foreign('patrimonial_intervention_type_id')->references('id')->on('patrimonial_intervention_types');

            $table->integer('material_id')->unsigned()->default(1);
            $table->foreign('material_id')->references('id')->on('materials');

            $table->integer('provider_id')->unsigned()->default(1);
            $table->foreign('provider_id')->references('id')->on('providers');

            $table->date('intervention_date')->nullable();
            $table->date('invoice_date')->nullable();
            $table->string('purchase_process', 25)->nullable();
            $table->string('invoice', 15)->nullable();
            $table->double('purchase_value', 15, 2)->default(0);
            $table->double('purchase_qty', 6, 2)->default(0);
            
            $table->timestamps();
            $table->softDeletes();

            $table->index(['patrimonial_id']);
            $table->index(['material_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patrimonial_materials');
    }
}
