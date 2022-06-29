★道場詳細ページ
route('dojos.edit', dojo()->id)"編集
route('reviews.create', dojo()->id)口コミ投稿


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
            <!--口コミ件数表示と利用者数の表示（別途確認）-->
            <span>口コミ{{$reviews->count()}}件</span>
            <span>気になるユーザー〇件</span>
            <span>利用数〇件</span>
        </div>
    </div>
    <div>
        <p><span>住所：</span>{{$dojo->area->name}}{{$dojo->address1}}{{$dojo->address2}}</p>
        <p><span>電話番号：</span>{{$dojo->tel}}</p>
        <span>ホームページ：</span><a href="{{$dojo->url}}"> {{$dojo->url}}</a>
    </div>
    <!--ボタン関連別途修正-->
    <div>
        <button type=button class="btn btn-primary">気になるボタン</button>
        <button type="button" class="btn btn-primary">利用したボタン</button>
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
            <button type="button" class="btn btn-primary" onclick="location.href='{{route('dojos.edit', $dojo->id)}}'">この道場を編集する</button>
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
                            <td>{{$dojo->use_step}}段以上</td>
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
                            <th>室内・屋外</th>
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
                            <td>＃</td>
                        </tr>
                        <tr>
                            <th>定休日</th>
                            <!--foreachでビジネスアワーテーブルより持ってくる-->
                            <td>＃</td>
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
                    </div>
                @endforeach
    
            </div>
            <p>※問題のある口コミを発見された場合は、こちらに通報ください。</p>
        </div>
    </div>
    
    
</div>




@endsection