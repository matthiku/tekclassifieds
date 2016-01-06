<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryIdToClassifiedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // add a category id field to our classifieds table as a foreign key
        Schema::table('classifieds', function(Blueprint $table) {
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // first empty the dependant table
        //Schema::table('classifieds')->delete();

        Schema::table('classifieds', function(Blueprint $table) {
            $table->dropForeign('classifieds_category_id_foreign');
        });
    }
}
