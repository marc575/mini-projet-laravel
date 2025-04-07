<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create(); 
 
        DB::table("clients")->insert([ 
            "npr" => $faker->name(), 
            "adresse" => $faker->address, 
            "email" => $faker->unique()->safeEmail, 
        ]); 
    }
}
