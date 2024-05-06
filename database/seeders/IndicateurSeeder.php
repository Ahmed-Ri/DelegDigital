<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class IndicateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {

            $dateSpecifique = Carbon::create(2024, 1, 1);
            DB::table('indicateurs')->insert([
                
             
                
                'trafic_facebook'=>$faker->numberBetween(30,100),
        'trafic_instagram'=>$faker->numberBetween(30,100),
        'trafic_google'=>$faker->numberBetween(30,100),
        'trafic_site'=>$faker->numberBetween(30,100),
        'note_facebook'=>$faker->randomFloat(1, 1, 5),
        'note_instagram'=>$faker->randomFloat(1, 1, 5),
        'note_google'=>$faker->randomFloat(1, 1, 5),
        'note_site' => $faker->randomFloat(1, 1, 5),
        'commentaire_facebook' => $faker->numberBetween(1, 200),
        'commentaire_instagram' => $faker->numberBetween(1, 200),
        'commentaire_google' => $faker->numberBetween(1, 200),
        'commentaire_site' => $faker->numberBetween(1, 200),
        'observation' => $faker->sentence,
        'termes' => $faker->word,


        'date'=>$dateSpecifique->format('Y-m-d'),
        'apparitionSite'=>$faker->numberBetween(1,20),
        'user_id' => rand(1,2),
            ]);
        }
    }
}
