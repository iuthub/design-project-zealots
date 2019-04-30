<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('category', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->string("name", 100);
			$table->string("slug", 20)->unique();
			$table->string("thumbnail")->nullable();
			$table->bigInteger("parent")->default(0)->nullable();
			$table->text("desc");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('category');
	}
}
