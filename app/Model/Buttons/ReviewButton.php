<?php

namespace App\Model\Buttons;

use Illuminate\Database\Eloquent\Model;

/**
 * 口コミへのいいねボタンの実装
 */
class ReviewButton extends Model
{
    /**
     * reviewsテーブルとのリレーション
     */
    public function review()
    {
        return $this->belongsTo('App\Model\Review');
    }
     
      
    /**
     * usersテーブルとのリレーション
     */
    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }
    
    /**
     * 既にいいねされているかどうかの確認
     * （口コミ）
     */
    public static function scopealreadyLiked($query, $user_id, $review_id)
    {
        $already_liked = $query->with('review')
                               ->where('user_id', $user_id)
                               ->where('review_id', $review_id)
                               ->first();
              
        if (!$already_liked) {
            $reviewButton = new ReviewButton;
            $reviewButton->review_id = $review_id;
            $reviewButton->user_id = $user_id;
            $reviewButton->save();
        } else {
            ReviewButton::where('review_id', $review_id)
                        ->where('user_id', $user_id)
                        ->delete();
        }
    }
    /**
     * 該当userが押したReviewbuttonのデータをもってくる
     * (マイページ表示)
     */
    public function scopegetReviewButtonUser($query, $user)
    {
        $query->with(['user', 'review'])
               ->where('user_id', $user->id)
               ->orderBy('created_at', 'desc');
    }
}
