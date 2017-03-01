<?php

use Illuminate\Database\Seeder;

class PostCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('post_category')->insert([
          'name'=> 'Bez kategorii',
          'slug'=> str_slug('Bez kategorii', '-'),
      ]);
    }
}
