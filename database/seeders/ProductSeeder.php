<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create();
        $units=['kg','meter','ounce'];
        $images=['1684602675gallery_image.jpeg','1684605421product_photo.jpg','1684681073product_photo.jpg','1688881419product_photo.jpg'];
        $categories=Categories::all();
        
        for($i=1;$i<=30;$i++){
            $product=Product::create([
                'name' =>$faker->name(),
                'unit' =>$units[array_rand($units)],
                'photos' =>$images[array_rand($images)],
                'gallery_image' =>$images[array_rand($images)],
                'category' =>'foods',
                'parent_category' =>'foods',
                'buying_price' =>$faker->numerify('#####'),
                'selling_price' =>$faker->numerify('#####'),
                'discount' =>$faker->numerify('#####'),
                'prepayment_amount' =>$faker->numerify('#####'),
                'minimum_order' =>1,
                'status' =>'Available',
                'adding_date' =>Carbon::now(),
                'expiring_date' =>Carbon::now()->addMonth(),
                'tags' =>'foods',
                'link_products' =>'',
                'product_description' =>'',
                'admin_description' =>''
    
            ]);

        }
    }
}
