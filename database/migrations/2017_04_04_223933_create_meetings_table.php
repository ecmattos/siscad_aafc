<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->increments('id');

            $table->date('date');
            $table->string('description', 50);
            $table->integer('meeting_type_id')->unsigned()->default(1);
            $table->foreign('meeting_type_id')->references('id')->on('meeting_types');
            $table->integer('meeting_status_id')->unsigned()->default(1);
            $table->foreign('meeting_status_id')->references('id')->on('meeting_statuses');
            $table->integer('city_id')->unsigned()->default(1);
            $table->foreign('city_id')->references('id')->on('cities');
            $table->float('expenses_members_food');
            $table->float('expenses_members_accommodation');
            $table->float('expenses_members_transport');
            $table->float('expenses_partners_food');
            $table->float('expenses_partners_accommodation');
            $table->float('expenses_partners_transport');
            $table->float('expenses_employees_food');
            $table->float('expenses_employees_accommodation');
            $table->float('expenses_employees_transport');

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
        Schema::drop('meetings');
    }
}
