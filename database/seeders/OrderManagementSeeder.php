<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\Client;
use App\Models\Product;
use App\Models\Order\Order;
use App\Models\Order\OrderItem;
use App\Models\Order\Shipment;
use App\Models\Order\PaymentMethod;
use App\Models\Order\Payment;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Password;
use Spatie\Permission\Models\Role;

class OrderManagementSeeder extends Seeder
{

    public function run(): void
    {
        $faker = Faker::create();

        // Create 100 clients
        for ($i = 0; $i < 100; $i++) {
            Client::create([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'phone' => $faker->unique()->phoneNumber,
                'phone2' => $faker->unique()->phoneNumber,
                'password'=>Hash::make('password'),
                'city' => $faker->city,
                'area' => $faker->city,
                'zone' => $faker->city,
                'location' => $faker->city,
                'google_id' =>$faker->numerify('')
                // ...
            ]);
        }
    
        // Create 200 orders with random client and product associations
        for ($i = 0; $i < 200; $i++) {
            $client = Client::inRandomOrder()->first();
            $product = Product::inRandomOrder()->first();
            $deliveryStatuses = ['pending', 'approved', 'processed','handed to courier manager', 'sent to courier','cancelled', 'delivered to customer'];
            $role=Role::where('name','Supplier')->first();
            $supplier=$role->users()->inRandomOrder()->first();

            Order::create([
                'client_id' => $client->id,
                'delivery_status' => $deliveryStatuses[rand(0,4)],
                'total_price' => $faker->randomFloat(2, 10, 1000),
                'order_date' => $faker->date(),
                'supplier_id' => $supplier->id,
            ]);
        }

        $faker = Faker::create();
        $orders = Order::all();
        $products = Product::all();

        //create order items for each order
        foreach ($orders as $order) {
            // Generate a random number of order items for each order
            $itemCount = $faker->numberBetween(1, 5);
            $total_price=0;
            for ($i = 0; $i < $itemCount; $i++) {
                $product = $products->random();
                $quantity= $faker->numberBetween(1, 10);
                OrderItem::create([
                    'order_id' => $order->order_id,
                    'product_id' => $product->id,
                    'quantity' => $quantity ,
                    'item_price' => $product->selling_price * $quantity,
                ]);
                $total_price= $total_price + $product->selling_price * $quantity ;
            }

            $order->total_price = $total_price ;
            $order->save();
        }

        //Payement seeder
        $faker = Faker::create();

        // Retrieve all orders
        $orders = Order::all();
    
        // Retrieve all payment methods
        $paymentMethods = PaymentMethod::all();
    
        foreach ($orders as $order) {
            // Generate random payment details
            $paymentStatus = $faker->randomElement(['full', 'partial','cash on delivery']);
            $paymentDate = $faker->dateTimeBetween($order->order_date, 'now');
            $transactionId = $faker->uuid;
            $banking_account = $faker->unique()->phoneNumber;
            $amount = $order->total_price;
    
            // Create a payment record for the order
            Payment::create([
                'order_id' => $order->order_id,
                'method_id' => $paymentMethods->random()->method_id,
                'payment_status' => $paymentStatus,
                'payment_date' => $paymentDate,
                'transaction_id' => $transactionId,
                'banking_account' => $faker->unique()->phoneNumber,
                'amount' => $amount,
                'due' => 0,
            ]);
        }
    
    }
}
