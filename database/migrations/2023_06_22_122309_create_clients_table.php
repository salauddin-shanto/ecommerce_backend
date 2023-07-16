<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable(); 
            $table->string('phone2')->nullable(); 
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('city')->nullable();
            $table->string('area')->nullable();
            $table->string('zone')->nullable();
            $table->string('location')->nullable();
            $table->string('google_id')->nullable();
            $table->string('facebook_id')->nullable();
            $table->softDeletes();
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};

?>