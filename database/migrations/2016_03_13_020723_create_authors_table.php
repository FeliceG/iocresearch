<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('authors', function(Blueprint $table)  {
    	$table->increments('id');
    	$table->timestamps();
    	$table->string('first_name')->nullable();
    	$table->string('last_name')->nullable();;
    	$table->string('organization')->nullable();;
    	$table->string('email')->nullable();;
    	$table->string('type')->nullable();;
      $table->integer('primary_count');
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
    	Schema::drop('authors');
    }
}
