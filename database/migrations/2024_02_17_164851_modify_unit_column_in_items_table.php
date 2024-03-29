<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyUnitColumnInItemsTable extends Migration
{
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->string('unit')->nullable(false)->change();
        });
    }

    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->string('unit')->nullable()->change();
        });
    }
}
?>