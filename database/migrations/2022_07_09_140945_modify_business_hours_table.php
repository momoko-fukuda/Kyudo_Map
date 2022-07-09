<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyBusinessHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('business_hours', function (Blueprint $table) {
            $table->dropColumn('from');
            $table->dropColumn('to');
            $table->time('from1')->nullable()->comment('開始時間1');
            $table->time('to1')->nullable()->comment('終了時間1');
            $table->time('from2')->nullable()->comment('開始時間2');
            $table->time('to2')->nullable()->comment('終了時間2');
            $table->time('from3')->nullable()->comment('開始時間3');
            $table->time('to3')->nullable()->comment('終了時間3');
            $table->time('from4')->nullable()->comment('開始時間4');
            $table->time('to4')->nullable()->comment('終了時間4');
            $table->time('from5')->nullable()->comment('開始時間5');
            $table->time('to5')->nullable()->comment('終了時間5');
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
            $table->time('from')->nullable()->comment('開始時間');
            $table->time('to')->nullable()->comment('終了時間');
        });
    }
}
