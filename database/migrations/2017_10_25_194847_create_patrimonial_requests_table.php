<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatrimonialRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patrimonial_requests', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('from_employee_id')->unsigned()->default(1);
            $table->foreign('from_employee_id')->references('id')->on('employees');


            $table->integer('to_management_unit_id')->unsigned()->default(1);
            $table->foreign('to_management_unit_id')->references('id')->on('management_units');

            $table->integer('to_company_sector_id')->unsigned()->default(1);
            $table->foreign('to_company_sector_id')->references('id')->on('company_sectors');

            $table->integer('to_company_sub_sector_id')->unsigned()->default(1);
            $table->foreign('to_company_sub_sector_id')->references('id')->on('company_sub_sectors');

            $table->integer('to_employee_id')->unsigned()->default(1);
            $table->foreign('to_employee_id')->references('id')->on('employees');

            $table->integer('to_patrimonial_status_id')->unsigned()->default(1);
            $table->foreign('to_patrimonial_status_id')->references('id')->on('patrimonial_statuses');

            $table->date('to_patrimonial_status_date')->nullable();

            $table->integer('patrimonial_request_status_id')->unsigned()->default(1);
            $table->foreign('patrimonial_request_status_id')->references('id')->on('patrimonial_request_statuses');

            $table->string('comments', 200)->nullable();
            
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
        Schema::dropIfExists('patrimonial_requests');
    }
}
