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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('arabicName')->required();
            $table->string('englishName')->required();
            $table->string('abbreviatedArabicname')->required();
            $table->string('abbreviatedEnglishname')->required();
            $table->integer('itemNumber')->required();
            $table->string('unit')->required()->enum(['متر', 'قطعة']); // Add more options if needed
            $table->string('group')->required();// Add more options if needed
            $table->boolean('is_active')->required();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
