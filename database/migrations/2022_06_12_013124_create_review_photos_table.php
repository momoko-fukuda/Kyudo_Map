<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


/**
 * review_photosテーブルのマイグレーションクラス
 */
class CreateReviewPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_photos', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->comment('review_photosテーブルのユニークID');
            $table->integer('review_id')->unsigned()->nullable()->comment('reviewsテーブルのid');
            $table->foreign('review_id')->references('id')->on('reviews')->onUpdate('CASCADE')->onDelete('CASCADE')->comment('reviewsテーブルのidを外部キーとして設定。更新・削除は連動。');
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
        Schema::dropIfExists('review_photos');
    }
}
