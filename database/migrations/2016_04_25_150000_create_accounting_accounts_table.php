<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountingAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounting_accounts', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('parent_id');
            
            $table->string('code', 20);
            $table->string('code_short', 10);
            $table->string('description', 50);

            $table->integer('account_type_id')->unsigned()->default(1);
            $table->foreign('account_type_id')->references('id')->on('account_types');

            $table->integer('account_balance_type_id')->unsigned()->default(1);
            $table->foreign('account_balance_type_id')->references('id')->on('account_balance_types');

            $table->integer('account_coverage_type_id')->unsigned()->default(1);
            $table->foreign('account_coverage_type_id')->references('id')->on('account_coverage_types');

            $table->double('balance_start', 15, 2)->default(0);

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
        Schema::drop('accounting_accounts');
    }
}
