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


<div>
    <ul class="nav nav-tabs nav-justified" role="tablist">
        <li class="nav-item">
           <a class="nav-link active" id="item1-tab" data-toggle="tab" href="#item1" role="tab" aria-controls="item1" aria-selected="true">トップページ</a>
        </li>
        <li class="nav-item">
           <a class="nav-link" id="item2-tab" data-toggle="tab" href="#item2" role="tab" aria-controls="item2" aria-selected="false">口コミ</a>
        </li>
    </ul>
    
    
    <div class="tab-content">
        <div class="tab-pane fade show active" id="item1" role="tabpanel" aria-labelledby="item1-tab">
            <div>
                <h4>写真</h4>
                <a href="{{route('photos.index', $dojo->id)}}">写真一覧</a>
                <p>{{$dojo->name}}のユーザーがアップロードした写真一覧になります</p>
                <!--foreachで記載が必要（modelでとってくる写真の数を制限）-->
                <img src="#" alt="弓道場の写真">
            </div>
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
                            <!--foreachでビジネスアワーテーブルより持ってくる-->
                            <!--$dojo->businesshours->from-->
                            <!--$dojo->businesshours->to-->
                            @foreach($businesshours as $businesshour)
                            <td>開始時間：{{ $businesshour ->from }}</td>
                            <td>終了時間：{{ $businesshour ->to }}</td>
                            @endforeach
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
        <div class="tab-pane fade" id="item2" role="tabpanel" aria-labelledby="item2-tab">
            <h4>口コミ</h4>
            <a type=button class="btn btn-primary" href="{{route('reviews.create', $dojo->id)}}">口コミ投稿する</a>
            <div>
                @foreach($reviews as $review)
                    <div class="card" style="width:50rem;">
                        <div class="card-body">
                            <p class="card-subtitle"><strong>{{$review->user->name}}</strong>さんの口コミ</p>
                            <h5 class="card-title">{{$review->title}}</h5>
                            <p class="card-text">{{$review->body}}</p>
                            <p>{{$review->created_at}}</p>
                        </div>
                        <!--いいねボタンの表示の仕方（削除ができない）-->
                    </div>
                @endforeach
    
            </div>
            <p>※問題のある口コミを発見された場合は、こちらに通報ください。</p>
        </div>
    </div>
    
    
</div>




@endsection