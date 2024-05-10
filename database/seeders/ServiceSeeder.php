<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('services')->insert(
            //admin
            [   
                'ServiceName' => 'Pet Sitter',
                'Price' => '1200',
                'description' => 'As a dedicated and compassionate pet sitter, I bring a wealth of experience and a genuine love animals to every assignment. Growing up surrounded by various pets, I developed a deep understanding
of their unique needs and personalities.',


            ]);
    }
}
