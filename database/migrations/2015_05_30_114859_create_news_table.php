<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('slug')->unique();
			$table->string('judul');
			$table->text('isi');
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
			$table->integer('kategori_id')->unsigned()->index();
			$table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');
			$table->integer('dibaca');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('news');
	}

}
