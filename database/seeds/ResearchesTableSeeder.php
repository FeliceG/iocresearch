<?php

use Illuminate\Database\Seeder;

class ResearchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    $faker = \Faker\Factory::create();

        for ($i=1; $i < 13; $i++)
        {
        DB::table('researches')->insert([
        'created_at'  => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at'  => Carbon\Carbon::now()->toDateTimeString(),
        'type'        => 'paper',
        'title'       => $faker->text($maxNbChars = 200),
        'background'  => $faker->text($maxNbChars = 500),
        'design'      => $faker->text($maxNbChars = 500),
        'findings'    => $faker->text($maxNbChars = 500),
        'discussion'  => $faker->text($maxNbChars = 500),
        'impact'      => $faker->text($maxNbChars = 500),
        'abstract'    => $faker->text($maxNbChars = 500),
         ]);
        }
     }
}
