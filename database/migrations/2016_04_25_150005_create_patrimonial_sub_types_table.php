<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatrimonialSubTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patrimonial_sub_types', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('code', 10);
            $table->string('description', 30);

            $table->integer('asset_accounting_account_id')->unsigned()->default(1);
            $table->foreign('asset_accounting_account_id')->references('id')->on('accounting_accounts');

            $table->integer('depreciation_accounting_account_id')->unsigned()->default(1);
            $table->foreign('depreciation_accounting_account_id')->references('id')->on('accounting_accounts');

            $table->double('useful_life_years', 2, 0)->nullable();

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
        Schema::drop('patrimonial_sub_types');
    }
}
