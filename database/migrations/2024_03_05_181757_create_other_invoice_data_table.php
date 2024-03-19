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
        Schema::create('other_invoice_data', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime('deliveryDate')->nullable();
            $table->text('invoiceNote')->nullable();
            $table->text('bottomNote1')->nullable();
            $table->text('bottomNote2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('other_invoice_data');
    }
};
