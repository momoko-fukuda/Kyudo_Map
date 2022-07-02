<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHolidayToDojosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dojos', function (Blueprint $table) {
            $table->boolean('holiday_mon')->default('false')->comment('月曜日が定休日（true/false）');
            $table->boolean('holiday_tues')->default('false')->comment('火曜日が定休日（true/false）');
            $table->boolean('holiday_wednes')->default('false')->comment('水曜日が定休日（true/false）');
            $table->boolean('holiday_thurs')->default('false')->comment('木曜日が定休日（true/false）');
            $table->boolean('holiday_fri')->default('false')->comment('金曜日が定休日（true/false）');
            $table->boolean('holiday_satur')->default('false')->comment('土曜日が定休日（true/false）');
            $table->boolean('holiday_sun')->default('false')->comment('日曜日が定休日（true/false）');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dojos', function (Blueprint $table) {
            $table->dropColumn('holiday_mon');
            $table->dropColumn('holiday_tues');
            $table->dropColumn('holiday_wednes');
            $table->dropColumn('holiday_thurs');
            $table->dropColumn('holiday_fri');
            $table->dropColumn('holiday_satur');
            $table->dropColumn('holiday_sun');
        });
    }
}
