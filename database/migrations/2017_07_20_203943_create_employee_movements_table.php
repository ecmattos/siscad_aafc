<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_movements', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('employee_id')->unsigned()->default(1);
            $table->foreign('employee_id')->references('id')->on('employees');

            $table->integer('management_unit_id')->unsigned()->default(1);
            $table->foreign('management_unit_id')->references('id')->on('management_units');

            $table->integer('company_position_id')->unsigned()->default(1);
            $table->foreign('company_position_id')->references('id')->on('company_positions');

            $table->integer('company_responsibility_id')->unsigned()->default(1);
            $table->foreign('company_responsibility_id')->references('id')->on('company_responsibilities');

            $table->integer('company_sector_id')->unsigned()->default(1);
            $table->foreign('company_sector_id')->references('id')->on('company_sectors');

            $table->integer('company_sub_sector_id')->unsigned()->default(1);
            $table->foreign('company_sub_sector_id')->references('id')->on('company_sub_sectors');

            $table->date('date_start')->nullable()->default(null);
            $table->date('date_end')->nullable()->default(null);
  
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
        Schema::drop('employee_movements');
    }
}
