<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order\Payment;
use App\Models\Order\Order;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders=Order::all();
        for ($i = 1; $i <= 30; $i++) {
            Payment::create([
                'order_id' => $i,
                'method_id' => rand(1, 4),
                'payment_status' => 'Completed',
                'payment_date' => now(),
                'transaction_id' => 'TXN-' . $i,
                'banking_account' => 'Address ' . $i,
                'amount' => rand(20000, 1000000),
                'due' => rand(20000, 1000000),
            ]);
        }
    }
}
