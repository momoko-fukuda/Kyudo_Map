<?php

namespace App\Http\Controllers;

// 使用するモデル
use App\Model\Dojo;
use App\Model\Review;
use App\Model\User;
use App\Model\Photos\DojoPhoto;
use App\Model\Buttons\ReviewButton;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    
    /**
     * middleware設定
     * (ログインしてない場合、お気に入り・利用したボタンの使用不可)
     */
    public function __construct()
    {
        $this->middleware('auth')
             ->only(['create', 'store', 'delete']);
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Dojo $dojo, Review $review)
    {
        $dojoId = $dojo->id;
        $reviews = Review::getReview($dojoId)
                           ->paginate(10);
                           

        return view('reviews.index', compact(
            'dojo',
            'reviews',
            'reviewbutton'
        ));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Dojo $dojo)
    {
        $user = Auth::user();
        return view('reviews.create', compact('dojo', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Dojo $dojo, Request $request)
    {
        $request->validate(
            [
            'title' => ['required', 'string'],
            'body' => ['required', 'string'],
            'img' => ['max:10000', 'mimes:jpeg,png,jpg,gif']
            ],
            [
                'img.max' => '写真データの容量が上限を越してます。（上限10MBまで）'
            ]
        );
            
        $review = new Review();
        Review::createReview($review, $request);
        
        DojoPhoto::createReviewDojoPhotos($request, $review);
        
        return redirect()->route('reviews.index', ['id' => $dojo->id]);
    }
    /**
     * いいね機能の実装
     */
    public function like(Request $request)
    {
        $user_id = Auth::user()->id;
        $review_id = $request->review_id;

         
        ReviewButton::alreadyLiked($user_id, $review_id);
        
        $review_likes_count = Review::withCount('reviewbuttons')
                                   ->findOrFail($review_id)
                                   ->reviewbuttons_count;
        $data = [
             'review_likes_count' => $review_likes_count,
             ];
     
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
