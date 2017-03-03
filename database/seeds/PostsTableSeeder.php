<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //reset table
        DB::table('posts')->truncate();


        $posts = [];
        $faker = Factory::create();
        $image = 'post_image_';
        for($i = 1; $i<= 20; $i++){
          $posts[]=[
            'user_id'=> 1,
            'title'=>$faker->sentence(rand(8,12)),
            'excerpt'=>$faker->text(rand(250,300)),
            'body'=>$faker->paragraphs(rand(10,15), true),
            'slug'=>$faker->slug(),
            'image'=> $image.rand(1,5).'.png',
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
            'category'=> 1,
            'active'=> rand(0,1),

          ];
        }

        DB::table('posts')->insert($posts);
    }
}
