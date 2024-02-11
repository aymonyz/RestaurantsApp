<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('branch_data', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar', 150);
            $table->string('name_en', 150);
            $table->string('address_ar', 150)->nullable();
            $table->string('address_en', 150)->nullable();
            $table->string('phone1', 50)->nullable();
            $table->string('phone2', 50)->nullable();
            $table->string('short_name', 20)->nullable();
            $table->timestamps(); // يضيف الحقول created_at و updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('branch_data');
    }
};

