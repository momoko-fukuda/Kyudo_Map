<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ユーザーごとのユニークID');
            $table->foreign('area_id')->references('id')->on('areas')->onUpdate('CASCADE')->onDelete('CASCADE')->comment('areasテーブルのidとってくる。更新・削除は連動');
            $table->string('name', 20)->comment('ユーザーのアカウント名');
            $table->string('email', 100)->unique()->comment('メールアドレス(ユニーク)');
            $table->timestamp('email_verified_at')->nullable()->comment('メール送信機能 (デフォルトはnull。利用時は別途設定が必要)');
            $table->string('password', 20)->comment('アカウントのパスワード');
            $table->rememberToken()->comment('トークン(パスワードリセット用)');
            $table->timestamps()->nullable()->comment('タイムスタンプ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
