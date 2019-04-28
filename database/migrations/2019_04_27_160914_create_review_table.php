<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('review', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger("product_id");
			$table->bigInteger("user_id");
			$table->timestamps();
			$table->unsignedSmallInteger("rating");
			$table->text("comment");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('review');
	}
}
