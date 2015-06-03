<?php

use Illuminate\Database\Migrations\Migration;

class AlterAttributesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('attributes', function($table)
		{
			$table->string('name')->after('id');
			$table->string('type')->after('slug');
			$table->text('options')->after('type')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('attributes', function($table)
		{
			$table->dropColumn('options');
			$table->dropColumn('type');
			$table->dropColumn('name');
		});
	}

}
