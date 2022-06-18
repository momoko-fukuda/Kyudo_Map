<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


/**
 * dojosテーブルのマイグレーションクラス
 */
class CreateDojosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dojos', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->comment('dojosデータのユニークID');
            $table->integer('user_id')->unsigned()->nullable()->comment('usersテーブルのid');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('SET NULL')->comment('usersテーブルのidを外部キーとして設定。更新は自動連携、削除時はNULLに置き換え。');
            $table->string('name', 50)->comment('道場名');
            $table->integer('area_id')->unsigned()->comment('areasテーブルのid');
            $table->foreign('area_id')->references('id')->on('areas')->onUpdate('CASCADE')->onDelete('RESTRICT')->comment('areasテーブルのidを外部キーとして設定。更新は自動更新、削除時はエラーを表示。');
            $table->string('address1', 250)->comment('市区町村名');
            $table->string('address2', 250)->comment('市区町村以下の住所名');
            $table->float('lat')->nullable()->comment('道場住所の経度(GoogleMapで使用)');
            $table->float('lng')->nullable()->comment('道場住所の緯度(GoogleMapで使用)');
            $table->string('tel', 20)->comment('道場の電話番号');
            $table->string('url', 250)->nullable()->comment('道場のWebサイトURL');
            $table->string('use_money', 250)->nullable()->comment('道場の利用料');
            $table->integer('use_age')->unsigned()->nullable()->comment('年齢制限');
            $table->string('use_step', 5)->nullable()->comment('段保有制限（初段～、参段～等）');
            $table->string('use_personal', 5)->nullable()->comment('個人利用可否');
            $table->string('use_group', 5)->nullable()->comment('団体利用可否');
            $table->string('use_affiliation', 5)->nullable()->comment('連盟/団体所属要否');
            $table->string('use_reserve', 5)->nullable()->comment('事前予約の要否');
            $table->string('facility_inout', 5)->nullable()->comment('屋外、室内');
            $table->string('facility_makiwara', 5)->nullable()->comment('巻藁ありなし');
            $table->string('facility_aircondition', 5)->nullable()->comment('冷暖房ありなし');
            $table->integer('facility_matonumber')->unsigned()->nullable()->comment('的数');
            $table->string('facility_lockerroom', 5)->nullable()->comment('更衣室のありなし');
            $table->string('facility_numberlimit', 20)->nullable()->comment('人数制限あるかどうか(コロナの影響で)');
            $table->string('facility_parking', 20)->nullable()->comment('近くに駐車場あるかどうか');
            $table->string('other')->nullable()->comment('その他備考');
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
        Schema::dropIfExists('dojos');
    }
}
