<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectResearchesAndAuthors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::table('authors', function(Blueprint $table)  {
    	$table->integer('research_id')->unsigned();
    	$table->foreign('research_id')->references('id')->on('researches');
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
    	Schema::table('authors', function(Blueprint $table)  {
    	$table->dropForeign('authors_research_id_foreign');
    	$table->dropColumn('research_id');
    	});
    }
}
