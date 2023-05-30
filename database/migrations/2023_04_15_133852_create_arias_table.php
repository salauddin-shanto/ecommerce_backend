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
        Schema::create('arias', function (Blueprint $table) {
            $table->id('aria_id');
            $table->string('aria_name');
            $table->string('parent_aria')->nullable();
            $table->timestamps();
        });
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arias');
    }
};
