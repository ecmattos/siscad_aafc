<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('fullname', 150);
            $table->string('email')->unique();
            $table->string('avatar')->default('default.png');
            $table->string('password', 60);
            
            $table->integer('user_status_id')->unsigned()->default(1);
            $table->foreign('user_status_id')->references('id')->on('user_statuses');
            
            $table->string('confirmation_code', 150);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
