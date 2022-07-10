<?php

namespace App\Model\Photos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * dojophotosテーブルとのリレーション
 * photoクラスを継承
 */
class DojoPhoto extends Model
{
    protected $fillable =['dojo_id', 'img',];
    
    
    /**
     * 道場テーブルとのリレーション
     */
    public function dojo()
    {
        return $this->belongsTo('App\Model\Dojo');
    }
    
    
    /**
     * 道場写真データの格納
     */
    public static function createDojoPhotos($request, $dojo)
    {
        $files = $request->file('img');
         
        if ($files) {
            foreach ($files as $file) {
                $dojophoto = new DojoPhoto();
                $dojophoto->dojo_id = $dojo->id;

                $path = Storage::disk('s3')->putFile('/test', $file, 'public');
            
                $dojophoto->img = Storage::disk('s3')->url($path);
                $dojophoto->save();
            }
        }
    }
}
