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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('pickup_date');
            $table->time('pickup_time_from');
            $table->time('pickup_time_to');
            $table->date('delivery_date');
            $table->time('delivery_time_from');
            $table->time('delivery_time_to');
            $table->string('branch');
            $table->string('area');
            $table->string('delivery_address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
