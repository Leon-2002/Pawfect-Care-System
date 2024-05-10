<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('users')->insert([
            //admin
            [   
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'status' => 'available',
                'password' => Hash::make('admin123'),
            ],

             //Employee
             [   
                'name' => 'Employee',
                'email' => 'employee@gmail.com',
                'role' => 'employee',
                'status' => 'available',
                'password' => Hash::make('employee'),
                // 'region' => 'REGION IV-A',
                // 'province' => 'quezon',
                // 'city' => 'agdangan',
                // 'barangay' => 'Poblacion II',
                // 'serviceType' => 'boarding',
             ],

             [   
                'name' => 'Employee1',
                'email' => 'employee1@gmail.com',
                'role' => 'employee',
                'status' => 'available',
                'password' => Hash::make('employee1'),
                // 'region' => 'REGION IV-A',
                // 'province' => 'quezon',
                // 'city' => 'agdangan',
                // 'barangay' => 'Poblacion II',
                // 'serviceType' => 'boarding',
                
             ],

             [   
                'name' => 'Employee2',
                'email' => 'employee2@gmail.com',
                'role' => 'employee',
                'status' => 'available',
                'password' => Hash::make('employee2'),
                // 'region' => 'REGION IV-A',
                // 'province' => 'quezon',
                // 'city' => 'agdangan',
                // 'barangay' => 'Poblacion II',
                // 'serviceType' => 'boarding',
                
             ],
             [
                'name' => 'Kim Agular',
                'email' => 'kimaguilar@example.com',
                'role' => 'employee',
                'status' => 'available',
                'password' => Hash::make('kimaguilar123'),

             ],

             [
                'name' => 'Hapon',
                'email' => 'hapon@example.com',
                'role' => 'employee',
                'status' => 'available',
                'password' => Hash::make('hapon123'),
             ],



              //user
            [   
                'name' => 'user',
                'email' => 'user@gmail.com',
                'role' => 'user',
                'status' => 'available',
                'password' =>  Hash::make('user1234'),
                // 'region' => 'REGION IV-A',
                // 'province' => 'quezon',
                // 'city' => 'agdangan',
                // 'barangay' => 'Poblacion II',
             
            ],

            [   
                'name' => 'Yunjin',
                'email' => 'user1@gmail.com',
                'role' => 'user',
                'status' => 'available',
                'password' =>  Hash::make('user1234'),
                // 'region' => 'REGION IV-A',
                // 'province' => 'quezon',
                // 'city' => 'agdangan',
                // 'barangay' => 'Poblacion II',
             
            ],


           


            ]);
    }
}
