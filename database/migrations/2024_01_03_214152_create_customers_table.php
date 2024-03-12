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
            $table->string('mobileNumber', 9)->nullable()->unique(); // جعل رقم الهاتف فريد
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
            if (Schema::hasColumn('customers', 'mobilenumber')) {
                Schema::table('customers', function (Blueprint $table) {
                    $table->dropUnique('customers_mobilenumber_unique');
                });
            }
            
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


