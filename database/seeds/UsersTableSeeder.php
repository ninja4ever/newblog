<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $date = date('Y-m-d H:i:s');
      DB::table('users')->insert([
          'name' => 'admin',
          'email' => 'admin@admin.pl',
          'password' => bcrypt('temp123'),
          'active' => 1,
          'created_at'=>$date,
          'updated_at'=>$date
      ]);
    }
}
