<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->string('pickupDate')->nullable();
            $table->string('pickupTimeFrom')->nullable();
            $table->string('pickupTimeTo')->nullable();
            $table->string('deliveryDate')->nullable();
            $table->string('deliveryTimeFrom')->nullable();
            $table->string('deliveryTimeTo')->nullable();
            $table->string('deliveryAddress')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->dropColumn('pickupDate');
            $table->dropColumn('pickupTimeFrom');
            $table->dropColumn('pickupTimeTo');
            $table->dropColumn('deliveryDate');
            $table->dropColumn('deliveryTimeFrom');
            $table->dropColumn('deliveryTimeTo');
            $table->dropColumn('deliveryAddress');
        });
    }
}