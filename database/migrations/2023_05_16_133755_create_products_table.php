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
        Schema::create('products', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->string('unit');
            $table->string('photos')->nullable();
            $table->string('gallery_image')->nullable();
            $table->string('category'); 
            $table->string('parent_category')->nullable();
            $table->decimal('buying_price',12,2); 
            $table->decimal('selling_price',12,2);
            $table->decimal('discount',12,2)->nullable();
            $table->decimal('prepayment_amount',12,2)->nullable();
            $table->decimal('minimum_order',12,2)->nullable();
            $table->string('status');
            $table->decimal('available_quantity',12,2)->nullable();
            $table->date('adding_date'); 
            $table->date('expiring_date'); 
            $table->string('tags')->nullable();
            $table->string('link_products')->nullable(); 
            $table->longText('product_description')->nullable();
            $table->longText('admin_description')->nullable(); 
            $table->timestamps();

            //


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
