<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $department_Ids = DB::table('departments')->pluck('id')->toArray();
        foreach(range(1,100) as $index){
            DB::table('employees')->insert([
                'department_id' => $faker->randomElement($department_Ids),
                'name'=>$faker->name(),
                'email'=>$faker->safeEmail(),
                'phone'=>$faker->phoneNumber(),
                'position'=>$faker->jobTitle(),
                'salary'=>$faker->randomFloat(2,1000,10000),
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }
    }
}
