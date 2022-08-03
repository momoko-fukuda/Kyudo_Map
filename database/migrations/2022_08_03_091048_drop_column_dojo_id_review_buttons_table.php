<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnDojoIdReviewButtonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('review_buttons', function (Blueprint $table) {
            $table->dropColumn('dojo_id');
            $table->dropColumn('ip');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('review_buttons', function (Blueprint $table) {
            $table->integer('dojo_id')->unsigned()->nullable()->comment('dojoテーブルのid');
            $table->foreign('dojo_id')->references('id')->on('dojos')->onUpdate('CASCADE')->onDelete('CASCADE')->comment('dojosテーブルのid取得。更新・削除は連動。');
            $table->string('ip')->nullable();
        });
    }
}
