<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



use App\Model\Dojo;
use App\Model\User;
use App\Model\Review;
use App\Model\Buttons\UseButton;
use App\Model\Buttons\FavoriteButton;
use App\Model\Buttons\ReviewButton;

class ButtonController extends Controller
{
    
    
    /**
     * middleware設定
     * (ログインしてない場合、お気に入り・利用したボタンの使用不可)
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * dojoshowページのお気に入り機能実装
     * お気に入りした時
     */
    public function favoritebutton(Dojo $dojo, Request $request)
    {
        $favoritebutton = FavoriteButton::create([
            'dojo_id' => $dojo->id,
            'user_id' => Auth::id(),
            ]);

        
        return redirect()->route('dojos.show', ['id' => $dojo->id]);
    }
    /**
     * dojoshowページのお気に入り機能実装
     * お気に入り外す時
     */
    public function unfavoritebutton(Dojo $dojo, Request $request)
    {
        $dojoId = $dojo->id;
        $userId = Auth::id();
        
        $favoritebutton = FavoriteButton::getFavoriteButton($dojoId, $userId)
                                        ->first();
        $favoritebutton->delete();
         
        return redirect()->route('dojos.show', ['id' => $dojo->id]);
    }
    
    
     
    /**
     * dojoshowページの利用したボタン機能の実装
     * 利用したを押した時
     */
    public function usebutton(Dojo $dojo, Request $request)
    {
        $usebutton = UseButton::create([
            'dojo_id' => $dojo->id,
            'user_id' => Auth::id(),
            ]);
            
        return redirect()->route('dojos.show', ['id' => $dojo->id]);
    }
    
    /**
     * dojoshowページの利用したボタン機能の実装
     * 利用したボタン解除
     */
    public function unusebutton(Dojo $dojo, Request $request)
    {
        $dojoId = $dojo->id;
        $userId = Auth::id();
        
        $favoritebutton = UseButton::getUseButton($dojoId, $userId)
                                        ->first();
        $favoritebutton->delete();
        
        return redirect()->route('dojos.show', ['id' => $dojo->id]);
    }
    
    
    // /**
    //  * review時のボタン機能の実装
    //  */
    // public function reviewbutton(Request $request, Dojo $dojo, Review $review)
    // {
    //     $reviewbutton = new ReviewButton();
    //     $reviewbutton->review_id = $review->id;
    //     $reviewbutton->ip = $request->ip();
            
    //     if (Auth::check()) {
    //         $reviewbutton->user_id = Auth::id();
    //     }
        
    //     dd($reviewbutton);
    //     $reviewbutton->save();
     
    //     return redirect()->route('reviews.index', ['id' => $dojo->id]);
    // }
     
    // /**
    //  * review時のボタン機能の実装（解除）
    //  */
    // public function unreviewbutton(Request $request, Dojo $dojo, Review $review)
    // {
    //     $user = $request->ip();
    //     $reviewbutton = ReviewButton::where('review_id', $review->id)
    //                                 ->where('ip', $user)
    //                                 ->first();
                                    
        
    //     return redirect()->route('reviews.index', ['id' => $dojo->id]);
    // }
    
    // public function favorite(Dojo $dojo, Review $review)
    // {
    //     $user = Auth::user();
        
        
    //     if ($user->hasFavorited($review)) {
    //         $user->unfavorite($review);
    //     } else {
    //         $user->favorite($review);
    //     }
        
    //     // ajaxにデータをいい送る。（trueか、count数）Qどうやって受け取って送るんだろう
    //     return [
    //         "isFavorite" => $user->hasFavorited($review),
    //         "count" => xxx
    //         ];

    //     // return redirect()->route('reviews.index', ['dojo'=> $dojo->id]);
    // }
}
