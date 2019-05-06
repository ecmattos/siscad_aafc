<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatrimonialRequestItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patrimonial_request_items', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('patrimonial_request_id')->unsigned()->default(1);
            $table->foreign('patrimonial_request_id')->references('id')->on('patrimonial_requests');

            $table->integer('patrimonial_id')->unsigned()->default(1);
            $table->foreign('patrimonial_id')->references('id')->on('patrimonials');

            $table->integer('from_management_unit_id')->unsigned()->default(1);
            $table->foreign('from_management_unit_id')->references('id')->on('management_units');

            $table->integer('from_company_sector_id')->unsigned()->default(1);
            $table->foreign('from_company_sector_id')->references('id')->on('company_sectors');

            $table->integer('from_company_sub_sector_id')->unsigned()->default(1);
            $table->foreign('from_company_sub_sector_id')->references('id')->on('company_sub_sectors');

            $table->integer('from_patrimonial_status_id')->unsigned()->default(1);
            $table->foreign('from_patrimonial_status_id')->references('id')->on('patrimonial_statuses');

            $table->integer('from_employee_id')->unsigned()->default(1);
            $table->foreign('from_employee_id')->references('id')->on('employees');

            $table->date('from_patrimonial_status_date')->nullable();
            $table->date('to_patrimonial_status_date')->nullable();
            
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
        Schema::dropIfExists('patrimonial_request_items');
    }
}
