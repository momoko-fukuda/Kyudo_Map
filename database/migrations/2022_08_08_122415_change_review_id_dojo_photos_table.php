<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeReviewIdDojoPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dojo_photos', function (Blueprint $table) {
            $table->dropForeign('dojo_photos_review_id_foreign');
            $table->foreign('review_id')
                  ->references('id')
                  ->on('reviews')
                  ->onUpdate('CASCADE')
                  ->onDelete('CASCADE')
                  ->comment('reviewsテーブルのidを外部キーとして設定。更新・削除は連動。')
                  ->change();
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
            $table->dropForeign('dojo_photos_review_id_foreign');
            $table->foreign('review_id')
                  ->references('id')
                  ->on('reviews')
                  ->onUpdate('CASCADE')
                  ->onDelete('SET NULL')
                  ->comment('reviewsテーブルのidを外部キーとして設定。更新は連動。削除時はNULL。')
                  ->change();
        });
    }
}
