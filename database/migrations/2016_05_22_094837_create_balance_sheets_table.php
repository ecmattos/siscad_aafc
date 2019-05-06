<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalanceSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balance_sheets', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('user_id')->unsigned()->default(1);
            $table->foreign('user_id')->references('id')->on('users');

            $table->date('date_start')->nullable()->default(null);
            $table->date('date_end')->nullable()->default(null);

            $table->integer('management_unit_id')->unsigned()->default(1);
            $table->foreign('management_unit_id')->references('id')->on('management_units');

            $table->integer('accounting_account_id')->unsigned()->default(1);
            $table->foreign('accounting_account_id')->references('id')->on('accounting_accounts');

            $table->double('balance_previous', 15, 2)->default(0);
            $table->double('credit', 15, 2)->default(0);
            $table->double('debit', 15, 2)->default(0);
            $table->double('balance_current', 15, 2)->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('balance_sheets');
    }
}
