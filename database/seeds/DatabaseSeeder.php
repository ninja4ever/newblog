<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(PostCategoryTableSeeder::class);
         $this->call(PostsTableSeeder::class);
         $this->call(PagesTableSeeder::class);
         $this->call(SettingsTableSeeder::class);
    }
}
