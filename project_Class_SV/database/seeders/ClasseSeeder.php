<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach(range(1,50) as $index){
            DB::table('classes')->insert([
                'class_code'=>'K'.$faker->unique()->numberBetween([45,67]).'A',
                'class_name'=>$faker->name(),
                'semester'=>$faker->randomElement([1,2]),
                'academic_year'=>$faker->year(),
                'advisor'=>$faker->name(),
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }
    }
}
