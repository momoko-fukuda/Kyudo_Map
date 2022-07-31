<!--★道場詳細ページ-->

@extends('layouts.app')

@section('content')

<!--パンくずリスト-->

<div class="route">
    <a href="{{route('home')}}">
        <i class="fa-solid fa-vihara"></i>
    </a>
    <i class="fa-solid fa-angles-right"></i>
    <a href="{{route('dojos.index')}}">弓道場検索</a>
    <i class="fa-solid fa-angles-right"></i>
    <strong class="now">
        <i class="fa-solid fa-bullseye"></i>
        {{$dojo->name}}
    </strong>
</div>
<hr>



<div id="showtop">
    <div id="dojoinfo">
        <div>
            <div>
                <h1><strong>{{$dojo->name}}</strong></h1>
                <small>
                    <i class="fa-solid fa-comment-dots"></i>
                    {{$dojo->reviews->count()}}件
                </small>
                <small>
                    <i class="fa-solid fa-heart"></i>
                    {{ $dojo->favoritebuttons->count() }}件
                </small>
                <small>
                    <i class="fa-solid fa-user-check"></i>
                    {{ $dojo->usebuttons->count() }}件
                </small>
                <p>
                    <small>最近更新された日時：{{$dojo->updated_at}}</small>
                </p>
            </div>
        </div>
        <div>
            @if($favoritebutton)
            <a href="/dojos/{{ $dojo->id }}/unfavoritebutton" 
               class="btn btn-delete w-10">
                <i class="fa-solid fa-heart"></i>
                お気に入り済
            </a>
            @else
            <a href="/dojos/{{ $dojo->id }}/favoritebutton" 
               class="btn btn-favorite w-10">
                <i class="fa-solid fa-heart"></i>
                お気に入り登録
            </a>
            @endif
    
            @if($usebutton)
            <a href="/dojos/{{ $dojo->id }}/unusebutton" 
               class="btn btn-delete w-10">
                <i class="fa-solid fa-user-check"></i>
                利用済
            </a>
            @else
            <a href="/dojos/{{ $dojo->id }}/usebutton" 
               class="btn btn-favorite w-10">
                <i class="fa-solid fa-user-check"></i>
                未利用
            </a>
            @endif
        </div>
        <table>
            <tr class="toptable">
                <th>住所</th>
                <td>
                    {{$dojo->area->name}}
                    {{$dojo->address1}}
                    {{$dojo->address2}}
                </td>
            </tr>
            <tr>
                <th>電話番号</dt>
                <td>
                    <a href="tel:{{$dojo->tel}}">{{$dojo->tel}}</a></td>
            </tr>

            <tr> 
            @if(!empty($dojo->url))
            <th>ホームページ</th>
            <td>
                <a href="{{$dojo->url}}"> {{$dojo->url}}</a>
            </td>
            @else
            <th>ホームページ</th>
            <td>未登録</td>
            @endif
            </tr>
        </table>
    </div>
    
    <div class="dojoimg">
        <div class="slide">
            @if($dojophotos->isEmpty())
                <img src="../../images/noimage2.png" alt="写真を投稿しよう">
                <img src="../../images/noimage1.png" alt="No Image">
            @else
                @foreach($dojophotos as $dojophoto)
                    <img src="{{ $dojophoto['img'] }}">
                @endforeach
            @endif
        </div>
        <div id="btn_img">
            @if($dojophotos->isNotEmpty())
                <a type="button" 
                   class="btn btn_show" 
                   href="{{route('photos.index', $dojo->id)}}">
                    <i class="fa-solid fa-camera"></i>
                    その他の写真もみる
                </a>
            @endif
            <a type=button 
               class="btn btn_show" 
               href="{{route('reviews.create', $dojo->id)}}">
                <i class="fa-solid fa-image"></i>
                写真を投稿する
            </a>
        </div>
        
    </div>
</div>

<hr>
<div>
    <div id="dojoterms">
        <div>
            <h4>弓道場利用制限</h4>
            <table>
                <tr class="toptable">
                    <th>利用料金</th>
                    @if(!empty($dojo->use_money))
                        <td>{{$dojo->use_money}}</td>
                    @else
                        <td>不明</td>
                    @endif
                </tr>
                <tr>
                    <th>年齢制限</th>
                    @if(!empty($dojo->use_age))
                        <td>{{$dojo->use_age}}歳</td>
                    @else
                        <td>不明</td>
                    @endif
                </tr>
                <tr>
                    <th>段資格の制限</th>
                    @if(!empty($dojo->use_step))
                        <td>{{$dojo->use_step}}以上</td>
                    @else
                        <td>不明</td>
                    @endif
                </tr>
                <tr>
                    <th>個人利用の可否</th>
                    <td>{{$dojo->use_personal}}</td>
                </tr>
                <tr>
                    <th>団体利用の可否</th>
                    <td>{{$dojo->use_group}}</td>
                </tr>
                <tr>
                    <th>連盟/団体への所属要否</th>
                    <td>{{$dojo->use_affiliation}}</td>
                </tr>
                <tr>
                    <th>事前予約の要否</th>
                    <td>{{$dojo->use_reserve}}</td>
                </tr>
                <tr>
                    <th>人数制限</th>
                     @if(!empty($dojo->facility_numberlimit))
                        <td>{{$dojo->facility_numberlimit}}</td>
                    @else
                        <td>不明</td>
                    @endif
                    
                </tr>
            </table>
        </div>
        <div>
            <h4>弓道場設備情報</h4>
            <table>
                <tr class="toptable">
                    <th>屋内・屋外</th>
                    <td>{{$dojo->facility_inout}}</td>
                </tr>
                <tr>
                    <th>巻藁の設置</th>
                    <td>{{$dojo->facility_makiwara}}</td>
                </tr>
                <tr>
                    <th>冷暖房設備</th>
                    <td>{{$dojo->facility_aircondition}}</td>
                </tr>
                <tr>
                    <th>的数</th>
                    @if(!empty($dojo->facility_matonumber))
                        <td>{{$dojo->facility_matonumber}}</td>
                    @else
                        <td>不明</td>
                    @endif
                </tr>
                <tr>
                    <th>更衣室</th>
                    <td>{{$dojo->facility_lockerroom}}</td>
                </tr>
                
                <tr>
                    <th>駐車場</th>
                    <td>{{$dojo->facility_parking}}</td>
                </tr>
                        
                <tr>
                    <th>営業時間</th>
                       
                    @if(!empty($businesshour->from1))
                        <td style="display: block;">
                            {{ substr($businesshour ->from1, 0, 5) }}
                            <span>～</span>
                            {{ substr($businesshour ->to1, 0, 5) }}
                        </td>
                    @endif
                    @if(!empty($businesshour->from2))
                        <td style="display: block;">
                            {{ substr($businesshour ->from2, 0, 5) }}
                            <span>～</span>
                            {{ substr($businesshour ->to2, 0, 5) }}
                        </td>
                    @endif
                    @if(!empty($businesshour->from3))
                        <td style="display: block;">
                            {{ substr($businesshour ->from3, 0, 5) }}
                            <span>～</span>
                            {{ substr($businesshour ->to3, 0, 5) }}
                        </td>
                    @endif
                    @if(!empty($businesshour->from4))
                        <td style="display: block;">
                            {{ substr($businesshour ->from4, 0, 5) }}
                            <span>～</span>
                            {{ substr($businesshour ->to4, 0, 5) }}
                        </td>
                    @endif
                    @if(!empty($businesshour->from5))
                        <td style="display: block;">
                            {{ substr($businesshour ->from5, 0, 5) }}
                            <span>～</span>
                            {{ substr($businesshour ->to5, 0, 5) }}
                        </td>
                    @endif
                        
                    @if(empty($businesshour->from1) 
                        && empty($businesshour->from2) 
                        && empty($businesshour->from3) 
                        && empty($businesshour->from4) 
                        && empty($businesshour->from5))
                        <td>不明</td>
                   @endif
                </tr>
                        
                <tr>
                    <th>定休日</th>
                    <td>
                                
                        @if($dojo->holiday_mon)
                                月曜日
                        @endif
                        @if($dojo->holiday_tues)
                                火曜日
                        @endif
                        @if($dojo->holiday_wednes)
                                水曜日
                        @endif
                        @if($dojo->holiday_thurs)
                                木曜日
                        @endif
                        @if($dojo->holiday_fri)
                                金曜日
                        @endif
                        @if($dojo->holiday_satur)
                                土曜日
                        @endif
                        @if($dojo->holiday_sun)
                                日曜日
                        @endif
                        @if(!$dojo->holiday_mon
                            && !$dojo->holiday_tues 
                            && !$dojo->holiday_wednes 
                            && !$dojo->holiday_thurs 
                            && !$dojo->holiday_fri 
                            && !$dojo->holiday_satur 
                            && !$dojo->holiday_sun)
                                不明
                        @endif
                                
                    </td>
                </tr>
                <tr>
                    <th>備考</th>
                    @if(!empty($dojo->other))
                        <td>{{$dojo->other}}</td>
                    @else
                        <td>不明</td>
                    @endif
                </tr>
            </table>
        </div>
    </div>
    <div id="toedit">
        <p>古い情報や、不明の箇所を更新してみんなに共有しよう！</p>
        <div>
            <img src="../../images/to_edit.png" 
                 alt="道場情報を更新しよう">
            <a type="button" class="btn btn_show" 
               href='{{route('dojos.edit', $dojo->id)}}'>
                道場情報を更新する
                <i class="fa-solid fa-rotate-right"></i>
            </a>
        </div>
    </div>
</div>

<hr>
<div id="reviews">
    <h4>{{$dojo->name}}に関する<br>最新口コミ</h4>
    
    <div>
        <a type=button 
           class="btn btn_show" 
           href="{{route('reviews.create', $dojo->id)}}">
            口コミ投稿する
        </a>
        
        @if($reviews->isNotEmpty())
            @foreach($reviews as $review)
                <div class="card">
                    <div class="card-header">
                        <p class="card-title">{{$review->title}}</p>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{$review->body}}</p>
                        
                        @if($review->user)
                            <span class="card-subtitle">
                                <i class="fa-solid fa-person-circle-check"></i>
                                {{$review->user->name}}さん | 
                            </span>
                        @else
                            <span class="card-subtitle">
                                <i class="fa-solid fa-person-circle-minus"></i>
                                退会済 | 
                            </span>
                        @endif
                        <span>
                            <i class="fa-solid fa-thumbs-up"></i>
                            {{$review->favorites->count()}} | 
                        </span>
                        <a href="{{route('reviews.index', $review->dojo->id)}}">
                            <span>
                                <i class="fa-solid fa-images"></i>
                                {{$review->dojophotos->count()}}
                            </span>
                        </a>|
                        <a href="{{route('home.contact')}}">
                            <span>
                                <i class="fa-solid fa-ghost"></i>
                                <small>違反報告</small>
                            </span>
                        </a>
                    </div>
                </div>
            @endforeach
            <a type=button 
               class="btn btn_show" 
               href="{{route('reviews.index', $review->dojo->id)}}">
                その他の口コミを見に行く
            </a>
        @else
            <p>ごめんなさい、まだ口コミは投稿されてません。</p>
            <img src="../images/sorry.gif">
        @endif
        
        
    </div>
    <p>
        ※問題のある口コミを発見された場合は、
        <a href="{{route('home.contact')}}">こちら</a>
        に通報ください。
    </p>
</div>

@endsection