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
        Schema::create('invoice_page_settings', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_start_letter')->default('A');
            $table->integer('max_per_letter')->default(99999);
            $table->decimal('default_tax', 5, 2)->default(0.00);
            $table->string('default_service')->default('غسيل');
            $table->boolean('auto_change_letter')->default(false);
            $table->boolean('activate_washing_cycle')->default(false);
            $table->integer('normal_processing_time')->default(48);
            $table->integer('quick_processing_time')->default(24);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_page_settings');
    }
};
