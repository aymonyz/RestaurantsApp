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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 255)->nullable(); // Name of the customer
            $table->string('country')->nullable(); // Country of the customer
            $table->string('branch')->nullable(); // Branch
            $table->string('mobileNumber', 9)->nullable(); // Mobile number with a length of 9 digits
            $table->string('mobileNumber2', 9)->nullable(); // Second mobile number, nullable
            $table->string('apartmentNumber', 255)->nullable(); // Apartment number
            $table->string('buildingNumber', 255)->nullable(); // Building number
            $table->text('address')->nullable(); // Address
            $table->string('priceList')->nullable(); // Price list
            $table->decimal('discount', 5, 2)->nullable(); // Discount
           // $table->boolean('freeze')->nullable(); // Freeze status
            $table->string('email', 255)->nullable(); // Email
            $table->string('taxNumber', 255)->nullable(); // Tax number
            $table->text('otherData')->nullable(); // Other data, nullable
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};


