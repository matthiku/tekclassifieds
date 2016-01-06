<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        // statically seed the categories table
        DB::table('categories')->insert(['name' => 'Desktop' ]);
        DB::table('categories')->insert(['name' => 'Laptop' ]);
        DB::table('categories')->insert(['name' => 'Smartphone' ]);
        DB::table('categories')->insert(['name' => 'Tablet' ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categories');
    }
}
