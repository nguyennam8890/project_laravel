<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToCatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cates', function(Blueprint $table)
		{
			$table->integer('ordering_index');
			$table->string('banner_url', 255);
			$table->string('banner', 255);
			$table->string('picture', 255);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cates', function(Blueprint $table)
		{
			//
		});
	}
}
/*  id
	name
	alias
	order(thứ tự)
	parentid
	description
	keyword
	status
	val[ordering_index]
	val[banner_url]
	banner
	picture

*/