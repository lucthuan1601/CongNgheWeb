<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach(range(1,10) as $index){
            DB::table('departments')->insert([
                'name'=>$faker->name(),
                'location'=>$faker->address(),
                'manager'=>$faker->name(),
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }
    }
}
