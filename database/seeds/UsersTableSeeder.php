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
          $user = \ioc\User::firstOrCreate(['email' => 'jill@harvard.edu']);
          $user->name = 'Jill';
          $user->email = 'jill@harvard.edu';
          $user->password = \Hash::make('helloworld');
          $user->save();

          $user = \ioc\User::firstOrCreate(['email' => 'jamal@harvard.edu']);
          $user->name = 'Jamal';
          $user->email = 'jamal@harvard.edu';
          $user->password = \Hash::make('helloworld');
          $user->save();


          $faker = \Faker\Factory::create();

          for ($i=1; $i < 11; $i++)
          {
            $fake_email = $faker->safeEmail;
            $user = \ioc\User::firstOrCreate(['email' => $fake_email]);
            $user->name = $faker->firstName;
            $user->email = $fake_email;
            $user->password = \Hash::make('helloworld');
            $user->save();
          }
    }
}
