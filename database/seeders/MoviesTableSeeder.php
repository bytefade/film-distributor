<?php

namespace Database\Seeders;

use App\Models\Distributor;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('pt_BR');

        for ($i = 0; $i < 50; $i++) {
            DB::table('movies')->insert([
                'status' => 1,
                'distributor_id' => Distributor::all()->random()->id,
                'roe' => 'E1402' . random_int(1000, 9999) . '00000',
                'national_title' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'original_title' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'url_trailer' => 'https://www.youtube.com/watch?v=' . Str::random(10),
                'synopsis' => $faker->realText($maxNbChars = 200, $indexSize = 2),
                'launch_date' => $faker->iso8601($max = 'now'),
                'classification' => random_int(5, 18),
                'duration' => random_int(60, 240),
            ]);
        }
    }
}
