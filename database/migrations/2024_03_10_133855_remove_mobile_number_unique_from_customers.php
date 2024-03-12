<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropUnique('customers_mobileNumber_unique'); // تأكد من أن اسم الفهرس صحيح
        });
    }

    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->string('mobileNumber', 9)->unique()->change();
        });
    }
};
