<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


/**
 * user_photosテーブルのマイグレーションクラス
 */
class CreateUserPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_photos', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->comment('user_photosテーブルのユニークID');
            $table->integer('user_id')->unsigned()->comment('usersテーブルのid');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE')->comment('usersテーブルのidを外部キーとして設定。更新・削除は連動');
            $table->binary('img')->comment('プロフィール画像（そのままDBに保存）');
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
        Schema::dropIfExists('user_photos');
    }
}
