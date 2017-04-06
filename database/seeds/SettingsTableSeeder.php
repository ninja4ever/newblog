<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //reset table
      DB::table('settings')->truncate();

      $settings = [
        [
          'name'=>'Nazwa Blogu',
          'type'=>'string',
          'value'=>'Mój blog',
          'can_delete'=>0,
        ],
        [
          'name'=>'Podpis',
          'type'=>'string',
          'value'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
          'can_delete'=>0,
        ],
        [
          'name'=>'Moja nazwa',
          'type'=>'string',
          'value'=>'Admin',
          'can_delete'=>0,
        ],
        [
          'name'=>'Opis',
          'type'=>'text',
          'value'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus quisquam, dolorum fuga quae repellat provident, molestias placeat alias optio impedit facere voluptatem nam id a maxime inventore corporis, atque mollitia.',
          'can_delete'=>0,
        ],
        [
          'name'=>'Zdjęcie opisu',
          'type'=>'image',
          'value'=>'40f491fe0a85cf1d719d30718bbaa4bd52902.jpg',
          'can_delete'=>0,
        ],

        // [
        //   'name'=>'',
        //   'type'=>'',
        //   'value'=>'',
        //   'can_delete'=>0,
        // ],
        // [
        //   'name'=>'',
        //   'type'=>'',
        //   'value'=>'',
        //   'can_delete'=>0,
        // ],
      ];

      DB::table('settings')->insert($settings);

    }
}
