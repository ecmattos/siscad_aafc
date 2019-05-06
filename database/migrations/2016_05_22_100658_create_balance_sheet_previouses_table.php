<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalanceSheetPreviousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balance_sheet_previouses', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('management_unit_id')->unsigned()->default(1);
            $table->foreign('management_unit_id')->references('id')->on('management_units');

            $table->integer('accounting_account_id')->unsigned()->default(1);
            $table->foreign('accounting_account_id')->references('id')->on('accounting_accounts');
            
            $table->integer('account_balance_type_id')->unsigned()->default(1);
            $table->foreign('account_balance_type_id')->references('id')->on('account_balance_types');

            $table->double('balance_previous', 15, 2)->default(0);

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
        Schema::drop('balance_sheet_previouses');
    }
}
