<?php

use Illuminate\Database\Seeder;

class ClassifiedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seed the classifieds table
        factory(App\Classified::class, 5)->create()->each(function() {
            
        });
    }
}
