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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('cart_id');
            $table->string('name');
            $table->decimal('price', 8, 2);
            // New fields
        $table->decimal('width', 8, 2)->nullable();
        $table->decimal('height', 8, 2)->nullable();
        $table->decimal('numberOfMeters', 8, 2)->nullable();
        $table->integer('quantity')->nullable();

           
            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
