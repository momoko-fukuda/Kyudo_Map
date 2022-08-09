<?php

namespace App\Http\Controllers;

use App\Model\Dojo;
use App\Model\Photos\Photo;
use App\Model\Photos\DojoPhoto;
use App\Model\Photos\ReviewPhoto;
use Illuminate\Http\Request;
use App\Http\Controllers\DojoController;

/**
 * 弓道場写真の一覧ページ
 */
class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Dojo $dojo)
    {
        $dojophotos = DojoPhoto::getDojoPhotos($dojo)
                                 ->paginate(12);
        
        return view('photos.index', compact('dojo', 'dojophotos'));
    }
}
