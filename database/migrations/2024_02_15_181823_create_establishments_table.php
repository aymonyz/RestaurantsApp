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
        Schema::create('establishments', function (Blueprint $table) {
            $table->id();
            $table->string('Establishmentneam', 150);
            $table->text('Establishmentdecebshan');
          // تأكد من أن هذا الحقل ينشئ بشكل صحيح كمفتاح أساسي
            $table->string('name', 150); // اسم الجماعة يمكن أن يكون من نوع نصي
            $table->timestamps();
           
        });
        
    }
  
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('establishments');
    }
};
