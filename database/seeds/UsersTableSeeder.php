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

          $faker = \Faker\Factory::create();

          for ($i=1; $i < 11; $i++)
          {
            $fake_email = $faker->safeEmail;
            $user = \ioc\User::firstOrCreate(['email' => $fake_email]);
            $user->first = $faker->firstName;
            $user->last = $faker->lastName;
            $user->organization = $faker->company;
            $user->email = $fake_email;
            $user->password = \Hash::make('helloworld');
            $user->save();
          }
    }
}
