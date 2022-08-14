<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * favoriteテーブルを削除
 * （アプリ構築後、変更による削除）
 * laravel-favoriteのテーブル
 */
class DropTableFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('favorites');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create(config('favorite.favorites_table'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger(config('favorite.user_foreign_key'))->index()->comment('user_id');
            $table->morphs('favoriteable');
            $table->timestamps();
        });
    }
}
