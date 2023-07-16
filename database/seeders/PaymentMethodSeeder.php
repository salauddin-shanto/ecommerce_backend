<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order\PaymentMethod;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        PaymentMethod::create([
            'name' => 'Credit Card',
            'description' => 'Payment through credit card',
        ]);
        PaymentMethod::create([
            'name' => 'PayPal',
            'description' => 'Payment through PayPal',
        ]);
        PaymentMethod::create([
            'name' => 'Bkash',
            'description' => 'Payment through Bkash',
        ]);

        PaymentMethod::create([
            'name' => 'Nagad',
            'description' => 'Payment through Nagad',
        ]);

    }
}
