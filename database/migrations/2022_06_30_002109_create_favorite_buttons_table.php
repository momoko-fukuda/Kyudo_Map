<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoriteButtonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorite_buttons', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('favorite_buttonsテーブルのユニークID');
            $table->integer('dojo_id')->unsigned()->nullable()->comment('dojoテーブルのid');
            $table->foreign('dojo_id')->references('id')->on('dojos')->onUpdate('CASCADE')->onDelete('CASCADE')->comment('dojosテーブルのid取得。更新・削除は連動。');
            $table->integer('user_id')->unsigned()->nullable()->comment('userテーブルのid');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE')->comment('usersテーブルのid取得。更新・削除は連動。');
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
        Schema::dropIfExists('favorite_buttons');
    }
}
