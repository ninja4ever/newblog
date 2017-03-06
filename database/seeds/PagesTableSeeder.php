<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //reset table
      DB::table('pages')->truncate();


      $pages = [];
      $faker = Factory::create();
      $image = 'post_image_';
      for($i = 1; $i<= 5; $i++){
        $pages[]=[

          'title'=>$faker->sentence(rand(8,12)),
          'excerpt'=>$faker->text(rand(250,300)),
          'body'=>$faker->paragraphs(rand(10,15), true),
          'slug'=>$faker->slug(),
          'image'=> $image.rand(1,5).'.png',
          'created_at'=> date('Y-m-d H:i:s'),
          'updated_at'=> date('Y-m-d H:i:s'),

          'active'=> rand(0,1),

        ];
      }

      DB::table('pages')->insert($pages);
    }
}
