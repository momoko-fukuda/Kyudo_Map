<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddcolumnDojoPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dojo_photos', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->nullable()->comment('userテーブルのid');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('SET NULL')->comment('usersテーブルのidを外部キーとして設定。更新は連動。削除時はNULL。');
            $table->integer('review_id')->unsigned()->nullable()->comment('reviewテーブルのid');
            $table->foreign('review_id')->references('id')->on('reviews')->onUpdate('CASCADE')->onDelete('SET NULL')->comment('reviewsテーブルのidを外部キーとして設定。更新は連動。削除時はNULL。');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dojo_photos', function (Blueprint $table) {
            //
        });
    }
}
