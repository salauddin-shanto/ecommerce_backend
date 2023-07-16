<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order\Order;
use App\Models\Order\OrderItem;
use App\Models\Order\Shipment;
use App\Models\Order\PaymentMethod;
use App\Models\Order\Payment;

class OrderSeeder extends Seeder
{
    
    public function run(): void
    {
        $deliveryStatuses = ['pending', 'approved', 'processed', 'sent to courier', 'delivered to customer'];
        $client_id=Client::all();
        for ($i = 1; $i <= 30; $i++) {
            Order::create([
                'client_id' => rand(1, 10),
                'delivery_status' => $deliveryStatuses[rand(0,4)],
                'total_price' => rand(20000,1000000),
                'payment_status' => 'done',
                'paid_amount' => $client_id[rand()],
                'order_date' => now(),
            ]);
        }

        for ($i = 1; $i <= 30; $i++) {
            OrderItem::create([
                'order_id' => rand(1, 30),
                'product_id' => rand(1, 20),
                'quantity' => rand(1, 5),
                'item_price' => rand(20000, 1000000),
            ]);
        }

        for ($i = 1; $i <= 30; $i++) {
            Shipment::create([
                'order_id' => $i,
                'shipment_date' => now(),
                'carrier' => 'Carrier ' . $i,
                'tracking_number' => 'TRACK-' . $i,
                // ...
            ]);
        }



    }
}
