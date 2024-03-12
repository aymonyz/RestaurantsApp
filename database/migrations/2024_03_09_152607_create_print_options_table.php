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
        Schema::create('print_options', function (Blueprint $table) {
            $table->id();
            $table->boolean('direct_print')->default(false);
            $table->integer('print_copies')->default(1);
            $table->string('printer_name')->nullable();
            $table->boolean('print_after_issue')->default(false);
            $table->text('note_below_invoice')->nullable();
            $table->text('note_below_invoice2')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('print_options');
    }
};
