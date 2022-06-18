<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


/**
 * usersテーブルのマイグレーションクラス
 */
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
            $table->bigIncrements('id')->unsigned()->comment('ユーザーごとのユニークID');
            $table->integer('area_id')->unsigned()->comment('areaテーブルのid');
            $table->foreign('area_id')->references('id')->on('areas')->onUpdate('CASCADE')->onDelete('RESTRICT')->comment('areasテーブルのidを外部キーとして設定。更新は連動・削除はエラーにする');
            $table->string('name', 20)->comment('ユーザーのアカウント名');
            $table->string('email', 100)->unique()->comment('メールアドレス(ユニーク)');
            $table->timestamp('email_verified_at')->nullable()->comment('メール送信機能 (デフォルトはnull。利用時は別途設定が必要)');
            $table->string('password', 20)->comment('アカウントのパスワード');
            $table->rememberToken()->comment('トークン(パスワードリセット用)');
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
        Schema::dropIfExists('users');
    }
}
