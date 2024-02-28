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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->text('items');
            $table->decimal('discount', 8, 2);
            $table->boolean('delivery');
            $table->decimal('deliveryCost', 8, 2);
            $table->boolean('urgent');
            $table->string('paymentMethod');
            $table->unsignedBigInteger('customerId');
            $table->decimal('totalPrice', 8, 2);
            $table->timestamps();

            $table->foreign('customerId')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
