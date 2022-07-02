<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnHolidayColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('business_hours', function (Blueprint $table) {
            $table->dropColumn('holiday');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('business_hours', function (Blueprint $table) {
            $table->string('holiday', 3)->nullable()->comment('曜日の名前');
        });
    }
}
