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
          'role'=> 1,
          'created_at'=>$date,
          'updated_at'=>$date
      ]);
      $users = [];
      for($i = 0; $i< 5; $i++){
        $date = date('Y-m-d H:i:s');
        $users[] = [
          'name' => 'admin'.$i,
          'email' => 'admin'.$i.'@admin.pl',
          'password' => bcrypt('temp123'),
          'active' => rand(0,1),
          'role'=> rand(0,1),
          'created_at'=>$date,
          'updated_at'=>$date
        ];
      }
      DB::table('users')->insert($users);
    }
}
