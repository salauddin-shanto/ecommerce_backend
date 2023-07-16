<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id('payment_id');
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('order_id')->on('orders');
            $table->unsignedBigInteger('method_id');
            $table->foreign('method_id')->references('method_id')->on('payment_methods');
            $table->string('payment_status');
            $table->date('payment_date');
            $table->string('transaction_id');
            $table->string('banking_account');
            $table->decimal('amount', 12, 2);
            $table->decimal('due', 12, 2);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
