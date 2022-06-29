<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewButtonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_buttons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('review_id')->unsigned()->nullable()->comment('reviewテーブルのid');
            $table->foreign('review_id')->references('id')->on('reviews')->onUpdate('CASCADE')->onDelete('CASCADE')->comment('reviewsテーブルのid取得。更新・削除は連動。');
            $table->integer('dojo_id')->unsigned()->nullable()->comment('dojoテーブルのid');
            $table->foreign('dojo_id')->references('id')->on('dojos')->onUpdate('CASCADE')->onDelete('CASCADE')->comment('dojosテーブルのid取得。更新・削除は連動。');
            $table->integer('user_id')->unsigned()->nullable()->comment('userテーブルのid');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE')->comment('usersテーブルのid取得。更新・削除は連動。');
            $table->string('ip')->nullable();
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
        Schema::dropIfExists('review_buttons');
    }
}
