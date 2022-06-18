<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * dojophotosテーブルのマイグレーションクラス
 */
class CreateDojoPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dojo_photos', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->comment('dojo_photosテーブルのユニークID');
            $table->integer('dojo_id')->unsigned()->comment('dojosテーブルのid');
            $table->foreign('dojo_id')->references('id')->on('dojos')->onUpdate('CASCADE')->onDelete('CASCADE')->comment('dojosテーブルのidを外部キーとして設定。更新・削除は連動。');
            $table->binary('img')->comment('道場画像');
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
        Schema::dropIfExists('dojo_photos');
    }
}
