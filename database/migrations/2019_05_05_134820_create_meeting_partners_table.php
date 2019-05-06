<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateMeetingPartnersTable.
 */
class CreateMeetingPartnersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('meeting_partners', function(Blueprint $table) {
            $table->increments('id');
			
			$table->integer('meeting_id')->unsigned()->default(1);
			$table->foreign('meeting_id')->references('id')->on('meetings');
			
			$table->integer('partner_id')->unsigned()->default(1);
			$table->foreign('partner_id')->references('id')->on('partners');
			
			$table->integer('expected_qty')->unsigned()->default(0);
			$table->integer('expected_qty_companion')->unsigned()->default(0);
			$table->integer('expected_qty_companion_extra')->unsigned()->default(0);
			$table->integer('confirmed_qty')->unsigned()->default(0);
			$table->integer('confirmed_qty_companion')->unsigned()->default(0);
			$table->integer('confirmed_qty_companion_extra')->unsigned()->default(0);

			$table->string('comments', 100);

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
		Schema::drop('meeting_partners');
	}
}
