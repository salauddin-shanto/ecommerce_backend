<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $districts=[
            'Bagerhat',
            'Bandarban',
            'Barguna',
            'Barisal',
            'Bhola',
            'Bogra',
            'Brahmanbaria',
            'Chandpur',
            'Chittagong',
            'Chuadanga',
            'Comilla',
            'Coxs Bazar',
            'Dhaka',
            'Dinajpur',
            'Faridpur',
            'Feni',
            'Gaibandha',
            'Gazipur',
            'Gopalganj',
            'Habiganj',
            'Jamalpur',
            'Jessore',
            'Jhalokati',
            'Jhenaidah',
            'Joypurhat',
            'Khagrachari',
            'Khulna',
            'Kishoreganj',
            'Kurigram',
            'Kushtia',
            'Lakshmipur',
            'Lalmonirhat',
            'Madaripur',
            'Magura',
            'Manikganj',
            'Maulvibazar',
            'Meherpur',
            'Munshiganj',
            'Mymensingh',
            'Naogaon',
            'Narail',
            'Narayanganj',
            'Narsingdi',
            'Natore',
            'Nawabganj',
            'Netrokona',
            'Nilphamari',
            'Noakhali',
            'Pabna',
            'Panchagarh',
            'Patuakhali',
            'Pirojpur',
            'Rajbari',
            'Rajshahi',
            'Rangamati',
            'Rangpur',
            'Satkhira',
            'Shariatpur',
            'Sherpur',
            'Sirajgonj',
            'Sunamganj',
            'Sylhet',
            'Tangail',
            'Thakurgaon'
        ];

        foreach ($districts as $district) {
            District::create([
                'district' => $district
            ]);
        }
    } 
}
