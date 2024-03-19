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
        Schema::create('delivery_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('enable_delivery_service');
            $table->decimal('min_delivery_order', 8, 2);
            $table->decimal('delivery_service_fee', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_settings');
    }
};
