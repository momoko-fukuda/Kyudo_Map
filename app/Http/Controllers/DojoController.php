<?php

namespace App\Http\Controllers;

// 使用するモデル
use App\Model\Dojo;
use App\Model\Review;
use App\Model\BusinessHour;
use App\Model\Area;
use App\Model\User;
use App\Model\Photos\DojoPhoto;
use App\Model\Buttons\UseButton;
use App\Model\Buttons\ReviewButton;
use App\Model\Buttons\FavoriteButton;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Log;

/**
 * 道場検索、詳細画面、道場新規登録のクラスコントローラ
 */
class DojoController extends Controller
{
    /**
     * dojoデータの新規作成、編集に関してはmiddleware設定
     * (ログインしてない場合、編集不可の設定)
     */
    public function __construct()
    {
        $this->middleware('auth')
            ->only(['create', 'store', 'edit', 'update']);
    }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Dojo $dojo)
    {
        $areas = Area::getAllArea();

        
        //検索フォームで入力された値を取得
        $area_id = $request->input('area_id');
        $addresskeyword = $request->input('addresskeyword');
        $dojo_name = $request->input('dojo_name');
        $use_personal = $request->input('use_personal');
        $use_group = $request->input('use_group');
        
        
        $dojos = Dojo::getDojoSearch(
            $area_id,
            $addresskeyword,
            $dojo_name,
            $use_personal,
            $use_group
        )->paginate(10);
        
        return view('dojos.index', compact(
            'dojos',
            'areas',
            'area_id',
            'dojo_name',
            'addresskeyword',
            'use_personal',
            'use_group',
            'latestphoto'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::getAllArea();
        $user = Auth::user();
        
        return view('dojos.create', compact('areas', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Dojo $dojo, Area $area)
    {
        $request->validate(
            [
                'user_id'=>['nullable', 'integer'],
                'name'=>['required', 'string', 'max:50','unique:dojos'],
                'area_id'=>['required','integer'],
                'address1'=>['required', 'string', 'max:250'],
                'address2'=>['required', 'string', 'max:250'],
                'tel'=>['required', 'string', 'max:20'],
                'url'=>['nullable', 'string'],
                'use_money'=> ['nullable', 'string', 'max:250'],
                'use_age' => ['nullable', 'integer'],
                'use_step' => ['nullable', 'string', 'max:5'],
                'use_personal'=> ['nullable', 'string', 'max:5'],
                'use_group'=> ['nullable', 'string', 'max:5'],
                'use_affiliation'=> ['nullable', 'string', 'max:5'],
                'use_reserve'=> ['nullable', 'string', 'max:5'],
                'facility_inout'=> ['nullable', 'string', 'max:5'],
                'facility_makiwara'=> ['nullable', 'string', 'max:5'],
                'facility_aircondition'=> ['nullable', 'string', 'max:5'],
                'facility_matonumber'=> ['nullable', 'integer'],
                'facility_lockerroom'=>['nullable', 'string', 'max:5'],
                'facility_numberlimit'=>['nullable', 'string', 'max:20'],
                'facility_parking'=> ['nullable', 'string', 'max:20'],
                'other'=> ['nullable', 'string', 'max:255'],
                'img.*' => ['mimes:jpeg,png,jpg,gif', 'max:2000'],
                // 'img' => ['max:20', 'array'],
                // ※千葉  imgパラメータは配列としてわたってくるので、
                //         imgパラメータを直接バリデーションするのではなく
                //         中身をバリデーションしなければいけない
                // memo:1枚当たりの容量設定はできたが、複数の合計値のバリエーションエラーはどうするか
            ],
            [
                'name.unique' => '既に登録されている道場名です。',
                'name.max' => '道場名は、50文字以内で入力してください',
                'address1.max' => '250文字以内で入力してください',
                'address2.max' => '250文字以内で入力してください',
                'tel.max' => '20文字以内で入力してください（ハイフンあり）',
                'use_money.max' => '250文字以内で入力してください',
                'use_age.integer' => '年齢制限を数字（半角）で入力してください',
                'facility_matonumber.integer' => '的数を数字（半角）で入力してください',
                'facility_numberlimit.max' => '20文字以内で入力してください',
                'other.max' =>  '255文字以内で入力してください',
                'img.max' => '写真データの容量が上限を越してます。（上限10MBまで）',
                'img.*.max' => '写真データの容量が上限を越してます。（1ファイルにつき上限2MBまで）',
                ]
        );
        
        $dojo = new Dojo();
        $businesshour = new BusinessHour();
        
        
        Dojo::createDojo(
            $dojo,
            $request
        );
        BusinessHour::createBusinessHour(
            $businesshour,
            $dojo,
            $request
        );
        
        
        DojoPhoto::createDojoPhotos($request, $dojo);
        
        return redirect()->route('dojos.show', ['id' => $dojo->id]);
    }

    /**
     * Display the specified resource.
     * 口コミデータ取得
     * お気に入りデータの取得
     * @param  int  $dojo
     * @return \Illuminate\Http\Response
     */
    public function show(Dojo $dojo, Review $review)
    {
        $dojoId = $dojo->id;
        $userId = Auth::id();
        
        $usebutton = UseButton::getUseButton($dojoId, $userId)
                                ->first();
                                
        $favoritebutton = FavoriteButton::getFavoriteButton($dojoId, $userId)
                                          ->first();
                                          
        $reviews = Review::getDojoReviewLast5($dojoId)
                           ->get();
                           
        //画像のアップ
        $dojophotos = DojoPhoto::limitGetDojoPhotos5($dojoId)
                                 ->get();
        
        $businesshour = BusinessHour::getBusinessHour($dojoId)
                                      ->first();
        
                           
        return view(
            'dojos.show',
            compact(
                'dojo',
                'reviews',
                'usebutton',
                'favoritebutton',
                'businesshour',
                'dojophotos'
            )
        );
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $dojo
     * @return \Illuminate\Http\Response
     */
    public function edit(Dojo $dojo)
    {
        $dojoId = $dojo->id;
        $user = Auth::user();
        $businesshour = BusinessHour::getBusinessHour($dojoId)
                                      ->first();

        
        // データ処理
        return view('dojos.edit', compact('dojo', 'businesshour', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $dojo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dojo $dojo, BusinessHour $businesshour)
    {
        $request->validate(
            [
                'user_id'=>['nullable', 'integer'],
                'url'=>['nullable', 'string'],
                'use_money'=> ['nullable', 'string', 'max:250'],
                'use_age' => ['nullable', 'integer'],
                'use_step' => ['nullable', 'string', 'max:5'],
                'use_personal'=> ['nullable', 'string', 'max:5'],
                'use_group'=> ['nullable', 'string', 'max:5'],
                'use_affiliation'=> ['nullable', 'string', 'max:5'],
                'use_reserve'=> ['nullable', 'string', 'max:5'],
                'facility_inout'=> ['nullable', 'string', 'max:5'],
                'facility_makiwara'=> ['nullable', 'string', 'max:5'],
                'facility_aircondition'=> ['nullable', 'string', 'max:5'],
                'facility_matonumber'=> ['nullable', 'integer'],
                'facility_lockerroom'=>['nullable', 'string', 'max:5'],
                'facility_numberlimit'=>['nullable', 'string', 'max:20'],
                'facility_parking'=> ['nullable', 'string', 'max:20'],
                'other'=> ['nullable', 'string', 'max:255'],
            ],
            [
                'use_money.max' => '250文字以内で入力してください',
                'use_age.integer' => '年齢制限を数字（半角）で入力してください',
                'facility_matonumber.integer' => '的数を数字（半角）で入力してください',
                'facility_numberlimit.max' => '20文字以内で入力してください',
                'other.max' =>  '255文字以内で入力してください',
                ]
        );
        



        Dojo::updateDojo(
            $dojo,
            $request
        );
        BusinessHour::updateBusinessHour(
            $businesshour,
            $dojo,
            $request
        );
        
        
        
        //データ登録
        return redirect()->route('dojos.show', ['id'=>$dojo->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $dojo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dojo $dojo)
    {
        //データ削除
    }
}
