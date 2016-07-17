<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		    Schema::table('products', function($table)
		{
		    $table->tinyInteger('pro_featured');
			$table->tinyInteger('pro_saller');
			$table->char('pro_price',20);
			$table->char('pro_unit',10);
			$table->tinyInteger('pro_not_price');
			$table->integer('pro_sell_off');
			$table->tinyInteger('pro_status');
			$table->text('pro_content');
			$table->text('pro_short_content');
			$table->text('pro_terms_of_use');
			$table->text('pro_digital');
			$table->text('pro_pros_use');
			$table->string('meta_title', 255);
			$table->string('meta_description', 255);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
