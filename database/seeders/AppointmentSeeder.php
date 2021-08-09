<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 0; $x <= 100; $x++) {
            DB::table('appointments')->insert([
                
            'doctor_id' => rand(5,10),
            'patient_id' => rand(1,50),
            'slot_id' => rand(1, 10),
            
            'appointment_date' => '2021-01-31', 
            'appointment_time' => '18:02:47', 
            'purpose' => 'General',
            'paid_amount' => 'free', 
            
                
    
            ]);    
          }
    }
}
