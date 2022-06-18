<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


/**
 * businesshoursテーブルのマイグレーションクラス
 */
class CreateBusinessHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_hours', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->comment('business_hoursテーブルのユニークID');
            $table->integer('dojo_id')->unsigned()->comment('dojosテーブルのid');
            $table->foreign('dojo_id')->references('id')->on('dojos')->onUpdate('CASCADE')->onDelete('CASCADE')->comment('dojosテーブルのidを外部キーとして設定。更新、削除は連動。');
            $table->string('holiday', 3)->nullable()->comment('曜日の名前');
            $table->time('from')->nullable()->comment('開始時間');
            $table->time('to')->nullable()->comment('終了時間');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_hours');
    }
}
