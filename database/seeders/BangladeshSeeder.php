<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bangladesh;

class BangladeshSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $divisions=[
            [
                'name' => 'dhaka',
                'districts' => [
                    [
                        'name' => 'narayanganj',
                        'upazillas' => 
                            [
                                'rupganj',
                                'arayhazar',
                            ],
                    ],
                    [
                        'name' => 'natore',
                        'upazillas' => 
                            [
                                'sadar',
                                'baraigram',
                            ],
                    ],  
                ]

            ],

            [
                'name' => 'rajshahi',
                'districts' => [
                    [
                        'name' => 'narayanganj',
                        'upazillas' => 
                            [
                                'rupganj',
                                'arayhazar',
                            ],
                    ],
                    [
                        'name' => 'natore',
                        'upazillas' => 
                            [
                                'sadar',
                                'baraigram',
                            ],
                    ],  
                ]
            ],
        ];



        foreach ($divisions as $division) {
            $divisionName = $division['name'];

            foreach ($division['districts'] as $district) {
                $districtName = $district['name'];

                foreach ($district['sub_districts'] as $subDistrict) {
                    Bangladesh::create([
                        'sub_districts' => $subDistrict,
                        'districts' => $districtName,
                        'divisions' => $divisionName,
                    ]);
                }
            }
        }
    }
}
