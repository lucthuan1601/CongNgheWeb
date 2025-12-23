<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $classe_Ids = DB::table('classes')->pluck('id')->toArray();
        foreach(range(1,100) as $index){
            DB::table('students')->insert([
                'class_id'=>$faker->randomElement($classe_Ids),
                'student_code'=>$faker->numberBetween([1000000,999999]),
                'name'=>$faker->name(),
                'email'=>$faker->safeEmail(),
                'phone'=>$faker->phoneNumber(),
                'date_of_birth'=>$faker->dateTime(),
                'address'=>$faker->address(),
                'gender'=>$faker->randomElement(['Nam','Nữ','Khác']),
                'status'=>$faker->randomElement(['Đang học','Nghỉ học','Tốt nghiệp']),
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }
    }
}
