<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdvancedSettings extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('accounts', function($table)
		{
			$table->string('primary_color');
			$table->string('secondary_color');
		});

		Schema::table('payments', function($table)
		{
			$table->dropForeign('payments_invoice_id_foreign');
			$table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade'); 			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('accounts', function($table)
		{
			$table->dropColumn('primary_color');
			$table->dropColumn('secondary_color');
		});
	}

}
