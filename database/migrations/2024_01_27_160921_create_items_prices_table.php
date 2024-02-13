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
        Schema::create('items_prices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('item_name'); // Add this line for item_name
            $table->string('service_type')->required();
            $table->boolean('urgent')->required();
            $table->decimal('price', 10, 2)->required();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items_prices');
    }
};
