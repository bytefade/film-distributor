<?php

namespace Database\Seeders;

use App\Models\Distributor;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistributorsTableSeeder extends Seeder
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
            DB::table('distributors')->insert([
                'cnpj' => $faker->cnpj(false),
                'social_name' => $faker->company(),
                'name' => $faker->name(),
            ]);
        }
    }
}
