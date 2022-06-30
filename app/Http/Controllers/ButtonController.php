<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Model\Dojo;
use App\Model\User;
use App\Model\Buttons\UseButton;
use App\Model\Buttons\FavoriteButton;

class ButtonController extends Controller
{
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
        $favoritebutton = UseButton::create([
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
}
