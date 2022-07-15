<!--★道場詳細ページ-->

@extends('layouts.app')

@section('content')

<!--パンくずリスト-->
<div>
    <div>
        <a href="{{route('home')}}">Home</a>>
        <a href="{{route('dojos.index')}}">弓道場検索</a>>
        <strong class="now">{{$dojo->name}}</strong>
    </div>
</div>


<div>
    <div>
        <div>
            <h1>{{$dojo->name}}</h1>
            <p><small>最近更新された日時：{{$dojo->updated_at}}</small></p>
            <span>口コミ{{$dojo->reviews->count()}}件</span>
            <span>お気に入り{{ $dojo->favoritebuttons->count() }}件</span>
            <span>利用数{{ $dojo->usebuttons->count() }}件</span>
        </div>
    </div>
    <div>
        <p><span>住所：</span>{{$dojo->area->name}}{{$dojo->address1}}{{$dojo->address2}}</p>
        <p><span>電話番号：</span>{{$dojo->tel}}</p>
        <span>ホームページ：</span><a href="{{$dojo->url}}"> {{$dojo->url}}</a>
    </div>
    <div>
        <div>
            @if($favoritebutton)
            <a href="/dojos/{{ $dojo->id }}/unfavoritebutton" class="btn btn-secondary w-10">
                お気に入り解除
            </a>
            @else
            <a href="/dojos/{{ $dojo->id }}/favoritebutton" class="btn btn-primary w-10">
                お気に入り
            </a>
            @endif
        </div>
        <div>
            @if($usebutton)
            <a href="/dojos/{{ $dojo->id }}/unusebutton" class="btn btn-secondary w-10">
                利用した解除
            </a>
            @else
            <a href="/dojos/{{ $dojo->id }}/usebutton" class="btn btn-primary w-10">
                利用した
            </a>
            @endif
        </div>
    </div>
</div>

<hr>
<div>
    <!--<ul class="nav nav-tabs nav-justified" role="tablist">-->
    <!--    <li class="nav-item">-->
    <!--       <a class="nav-link active" id="item1-tab" data-toggle="tab" href="#item1" role="tab" aria-controls="item1" aria-selected="true">トップページ</a>-->
    <!--    </li>-->
    <!--    <li class="nav-item">-->
    <!--       <a class="nav-link" id="item2-tab" data-toggle="tab" href="#item2" role="tab" aria-controls="item2" aria-selected="false">口コミ</a>-->
    <!--    </li>-->
    <!--</ul>-->
    
    
    <div class="tab-content">
        <div class="" id="item1" role="tabpanel" aria-labelledby="item1-tab">
            <div>
                <h4>写真</h4>
                
                <a type=button class="btn btn-primary" href="{{route('reviews.create', $dojo->id)}}">写真を投稿する</a>
                
                

                <div>
                    @if($dojophotos->isEmpty())
                        <p>ごめんなさい、まだ投稿されてません。</p>
                    @else
                        <p>{{$dojo->name}}のユーザーがアップロードした写真になります</p>
                        
                        @foreach($dojophotos as $dojophoto)
                        <img src="{{ $dojophoto['img'] }}" class="w-25 h-50">
                        @endforeach
                        <a type="button" class="btn btn-primary" href="{{route('photos.index', $dojo->id)}}">その他の写真もみる</a>
                    @endif
                </div>
            </div>
            <hr>
            <div>
                <div>
                    <h4>弓道場利用制限</h4>
                    <button type="button" class="btn btn-primary" onclick="location.href='{{route('dojos.edit', $dojo->id)}}'">道場情報を更新する</button>
                    <table>
                        <tr>
                            <th>利用料金</th>
                            <td>{{$dojo->use_money}}</td>
                        </tr>
                        <tr>
                            <th>年齢制限</th>
                            <td>{{$dojo->use_age}}歳</td>
                        </tr>
                        <tr>
                            <th>段制限</th>
                            <td>{{$dojo->use_step}}以上</td>
                        </tr>
                        <tr>
                            <th>個人利用</th>
                            <td>{{$dojo->use_personal}}</td>
                        </tr>
                        <tr>
                            <th>団体利用</th>
                            <td>{{$dojo->use_group}}</td>
                        </tr>
                        <tr>
                            <th>連盟/団体への所属</th>
                            <td>{{$dojo->use_affiliation}}</td>
                        </tr>
                        <tr>
                            <th>事前予約</th>
                            <td>{{$dojo->use_reserve}}</td>
                        </tr>
                        
                    </table>
                </div>
                <div>
                    <h4>弓道場設備情報</h4>
                    <table>
                        <tr>
                            <th>屋内・屋外</th>
                            <td>{{$dojo->facility_inout}}</td>
                        </tr>
                        <tr>
                            <th>巻藁</th>
                            <td>{{$dojo->facility_makiwara}}</td>
                        </tr>
                        <tr>
                            <th>冷暖房設備</th>
                            <td>{{$dojo->facility_aircondition}}</td>
                        </tr>
                        <tr>
                            <th>的数</th>
                            <td>{{$dojo->facility_matonumber}}</td>
                        </tr>
                        <tr>
                            <th>更衣室</th>
                            <td>{{$dojo->facility_lockerroom}}</td>
                        </tr>
                        <tr>
                            <th>人数制限</th>
                            <td>{{$dojo->facility_numberlimit}}</td>
                        </tr>
                        <tr>
                            <th>駐車場</th>
                            <td>{{$dojo->facility_parking}}</td>
                        </tr>
                        
                        <tr>
                            <th>営業時間</th>
                            
                            @if(!empty($businesshour->from1))
                            <td>1 開始時間：{{ substr($businesshour ->from1, 0, 5) }}</td>
                            <td>終了時間：{{ substr($businesshour ->to1, 0, 5) }}</td>
                            @endif
                            @if(!empty($businesshour->from2))
                            <td>2 開始時間：{{ substr($businesshour ->from2, 0, 5) }}</td>
                            <td>終了時間：{{ substr($businesshour ->to2, 0, 5) }}</td>
                            @endif
                            @if(!empty($businesshour->from3))
                            <td>3 開始時間：{{ substr($businesshour ->from3, 0, 5) }}</td>
                            <td>終了時間：{{ substr($businesshour ->to3, 0, 5) }}</td>
                            @endif
                            @if(!empty($businesshour->from4))
                            <td>4 開始時間：{{ substr($businesshour ->from4, 0, 5) }}</td>
                            <td>終了時間：{{ substr($businesshour ->to4, 0, 5) }}</td>
                            @endif
                            @if(!empty($businesshour->from5))
                            <td>5 開始時間：{{ substr($businesshour ->from5, 0, 5) }}</td>
                            <td>終了時間：{{ substr($businesshour ->to5, 0, 5) }}</td>
                            @endif

                        </tr>
                        
                        <tr>
                            <th>定休日</th>
                            <!--foreachでビジネスアワーテーブルより持ってくる-->
                            <!--$dojo->businesshours->holiday-->
                            <td>
                                
                                @if($dojo->holiday_mon == 'true')
                                  月曜日
                                @endif
                                @if($dojo->holiday_tues == 'true')
                                  火曜日
                                @endif
                                @if($dojo->holiday_wednes == 'true')
                                  水曜日
                                @endif
                                @if($dojo->holiday_thurs == 'true')
                                  木曜日
                                @endif
                                @if($dojo->holiday_fri == 'true')
                                  金曜日
                                @endif
                                @if($dojo->holiday_satur == 'true')
                                  土曜日
                                @endif
                                @if($dojo->holiday_sun == 'true')
                                  日曜日
                                @endif
                                @if($dojo->holiday_mon == 'false' 
                                    and $dojo->holiday_tues == 'false' 
                                    and $dojo->holiday_wednes == 'false' 
                                    and $dojo->holiday_thurs == 'false' 
                                    and $dojo->holiday_fri == 'false' 
                                    and $dojo->holiday_satur == 'false' 
                                    and $dojo->holiday_sun == 'false' )
                                　不明
                                @endif
                                
                            </td>
                        </tr>
                        <tr>
                            <th>その他</th>
                            <td>{{$dojo->other}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            
            
        </div>
        <hr>
        <div class="" id="item2" role="tabpanel" aria-labelledby="item2-tab">
            <h4>口コミ</h4>
            <a type=button class="btn btn-primary" href="{{route('reviews.create', $dojo->id)}}">口コミ投稿する</a>
            <div>
                @if(count($reviews) > 0)
                    @foreach($reviews as $review)
                        <div class="card" style="width:50rem;">
                            <div class="card-body">
                                @if($review->user)
                                    <h6 class="card-subtitle">{{$review->user->name}}</h6>
                                @else
                                    <h6 class="card-subtitle">退会済ユーザー</h6>
                                @endif
                                <h5 class="card-title">{{$review->title}}</h5>
                                <p class="card-text">{{$review->body}}</p>
                                <p>{{$review->created_at}}</p>
                            </div>
                            <span>参考になった数：{{$review->favorites->count()}}</span>
                            
                        </div>
                    @endforeach
                <a type="button" class="btn btn-primary" href="{{route('reviews.index', $dojo->id )}}">もっと{{$dojo->name}}の口コミをみる</a>
                
                @else
                
                <p>ごめんなさい、まだ口コミは投稿されてません。</p>
                
                @endif
                
            </div>
            

            <p>※問題のある口コミを発見された場合は、こちらに通報ください。</p>
        </div>
    </div>
    
    
</div>




@endsection