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
        Schema::create('client_statistics', function (Blueprint $table) {
            $table->id('client_statistics_id');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->integer('total_order');
            $table->decimal('minimum_order_value', 12, 2);
            $table->decimal('maximum_order_value', 12, 2);
            $table->decimal('total_order_amount', 12, 2);
            $table->decimal('average_order_value', 12, 2);
            $table->unsignedBigInteger('client_type_id');
            $table->foreign('client_type_id')->references('client_type_id')->on('client_types');
            $table->decimal('most_ordered_item_category', 12, 2);
            $table->date('last_activity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_statistics');
    }
};
