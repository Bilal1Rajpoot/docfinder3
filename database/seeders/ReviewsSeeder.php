<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 0; $x <=100 ; $x++) {

            DB::table('reviews')->insert([

            'doctor_id' => rand(5,10),
            'patient_id' => rand(1,10),
            
            'review' => Str::random(100),
            'rating' => rand(1, 5),
                
    
            ]);    
          }
    }
}
