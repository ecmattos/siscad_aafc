<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->nullable();
            $table->integer('code');
            $table->string('cpf', 14)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('zip_code', 10)->nullable();
            $table->string('neighborhood', 30)->nullable();
            $table->string('phone', 11)->nullable();
            $table->string('mobile', 11)->nullable();
            $table->string('email', 50)->nullable();

            $table->integer('city_id')->unsigned()->default(1);
            $table->foreign('city_id')->references('id')->on('cities');

            $table->integer('management_unit_id')->unsigned()->default(1);
            $table->foreign('management_unit_id')->references('id')->on('management_units');

            $table->integer('company_sector_id')->unsigned()->default(1);
            $table->foreign('company_sector_id')->references('id')->on('company_sectors');

            $table->integer('company_sub_sector_id')->unsigned()->default(1);
            $table->foreign('company_sub_sector_id')->references('id')->on('company_sub_sectors');

            $table->integer('company_position_id')->unsigned()->default(1);
            $table->foreign('company_position_id')->references('id')->on('company_positions');

            $table->integer('company_responsibility_id')->unsigned()->default(1);
            $table->foreign('company_responsibility_id')->references('id')->on('company_responsibilities');

            $table->integer('employee_status_id')->unsigned()->default(1);
            $table->foreign('employee_status_id')->references('id')->on('employee_statuses');

            $table->date('date_status')->nullable()->default(null);

            $table->integer('employee_status_reason_id')->unsigned()->default(1);
            $table->foreign('employee_status_reason_id')->references('id')->on('employee_status_reasons');

            $table->integer('gender_id')->unsigned()->default(1);
            $table->foreign('gender_id')->references('id')->on('genders');
                        
            $table->date('birthday')->nullable()->default(null);

            $table->string('comments', 200)->nullable();
  
            $table->timestamps();
            $table->softDeletes();

            $table->index(['name']);
            $table->index(['code']);
            $table->index(['cpf']);

            $table->index(['name', 'code', 'cpf']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
