<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments(column: 'id');
            $table->string(column: 'invoice_number');
            $table->date(column: 'invoice_date');
            $table->date(column: 'due_date');
            $table->string(column: 'product');
            $table->string(column: 'section');
            $table->string(column: 'discount');
            $table->string(column: 'rate_vat');
            $table->decimal(column: 'value_vat', total: 8, places: 2);
            $table->decimal(column: 'total', total: 8, places: 2);
            $table->string(column: 'status', length: 50);
            $table->integer(column: 'value_status');
            $table->text(column: 'note')->nullable();
            $table->string(column: 'user');
            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
