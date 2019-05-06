<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->string('avatar', 50)->default('default.png');
            $table->string('name', 100)->nullable();
            $table->integer('code');
            $table->string('cpf', 14)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('zip_code', 10)->nullable();
            $table->string('neighborhood', 30)->nullable();
            $table->string('phone', 11)->nullable();
            $table->string('mobile', 11)->nullable();
            $table->string('email', 50)->nullable();

            $table->integer('plan_id')->unsigned()->default(1);
            $table->foreign('plan_id')->references('id')->on('plans');

            $table->integer('member_status_id')->unsigned()->default(1);
            $table->foreign('member_status_id')->references('id')->on('member_statuses');

            $table->integer('city_id')->unsigned()->default(1);
            $table->foreign('city_id')->references('id')->on('cities');

            $table->integer('member_status_reason_id')->unsigned()->default(1);
            $table->foreign('member_status_reason_id')->references('id')->on('member_status_reasons');


            $table->integer('gender_id')->unsigned()->default(1);
            $table->foreign('gender_id')->references('id')->on('genders');

            $table->date('date_aafc_ini')->nullable()->default(null);
            $table->date('date_aafc_fim')->nullable()->default(null);
            $table->date('date_inss')->nullable()->default(null);
            $table->date('date_fundacao')->nullable()->default(null);
            $table->date('birthday')->nullable()->default(null);

            $table->integer('bank_id')->unsigned()->default(1);
            $table->foreign('bank_id')->references('id')->on('banks');

            $table->string('bank_agency', 5)->nullable();
            $table->string('bank_account', 20)->nullable();

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
        Schema::drop('members');
    }
}
