<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


/**
 * reviewsテーブルのマイグレーションクラス
 */
class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->comment('reviewsテーブルのユニークID');
            $table->integer('dojo_id')->unsigned()->comment('dojoテーブルのid');
            $table->foreign('dojo_id')->references('id')->on('dojos')->onUpdate('CASCADE')->onDelete('CASCADE')->comment('dojosテーブルのid取得。更新・削除は連動。');
            $table->integer('user_id')->unsigned()->nullable()->comment('usersテーブルのid');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('SET NULL')->comment('usersテーブルのid取得。更新は連動、削除はNULLにしてデータ残す。');
            $table->string('title')->comment('口コミタイトル');
            $table->text('body')->comment('口コミ内容');
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
        Schema::dropIfExists('reviews');
    }
}
