<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\Users\User;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->delete();

      User::create([
        'name' => 'ADMIN USER',
        'email' => 'admin@admin.br',
        //'plainPassword' => null,
        'password' => bcrypt('123456'),
        'status' => 1,
      ]);

      $faker = Faker::create();

      foreach (range(1,5) as $index) {
        User::create([
          'name' => strtoupper($faker->name),
          'email' => $faker->unique()->safeEmail,
          //'plainPassword' => null,
          'password' => bcrypt('123456'),
          //'status' => 1, //usuario ativo - default true
          'remember_token' => str_random(10),
        ]);
      }

      foreach (range(1,5) as $index) {
        User::create([
          'name' => strtoupper($faker->name),
          'email' => $faker->unique()->safeEmail,
          //'plainPassword' => null,
          'password' => bcrypt('123456'),
          'status' => 0, //usuario inativo
          'remember_token' => str_random(10),
        ]);
      }
    }
}
