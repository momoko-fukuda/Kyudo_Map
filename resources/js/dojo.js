
$( function()
{
    console.log('jQuery');
    
    
});

    /**
     * 営業時間の追加表示(dojoscreate画面)
     */
    $(function(){
        $('.hidehours').hide();
    
        $('.fadehourbtn').click(function(){
            $('.hidehours').toggle();
        });
    
    
    /**
     * dojos/create.blade.php
     * reviews/create.blade.php
     * ファイル選択のレイアウトコード
     */
    $('.custom-file-input').on('change', handleFileSelect);
        function handleFileSelect(evt) {
        
        let files = evt.target.files;
        $(this).next('.custom-file-label').html(+ files.length + '個のファイルを選択しました');
        
    }
        
    $('.reset').click(function(){
        $(this).parent().prev().children('.custom-file-label').html('ファイル選択...');
        $('.custom-file-input').val('');
    });
    
    
    /**
     * 各口コミの画像を表示させるコード
     * (reviews/index.blade.php)
     */
    $('.photomore').click(function() {
        $reviewPanel = $(this).parent();
        $reviewPanelChild = $reviewPanel.children('.hidephotos');
             
        if(!$reviewPanelChild.hasClass('open')){
            $reviewPanelChild.slideDown().addClass('open');
            $reviewPanel.children('.photomore').text('閉じる');
        }else{
            $reviewPanelChild.slideUp().removeClass('open');
            $reviewPanel.children('.photomore').text('写真を表示する');
        }
    });

    /**
     * SP版の道場エリア表示コード
     * （homeblade）
     */
    
    if(window.matchMedia("(max-width: 979px)").matches){
        $('.area').click(function() {
                $areaId = $(this).parent();
                $areas = $areaId.children('dd');
                if(!$areas.hasClass('display-none')){
                    $areas.slideDown().addClass('display-none').css('display', 'block');
                }else{
                    $areas.slideUp().removeClass('display-none').css('display', 'none');
                }
        });
    }
    
    /**
     * 口コミいいねの非同期処理
     */
     $('.like-toggle').on('click', function(){
        let $this = $(this);
        let likeReviewId = $this.data('review-id');
        
        $.ajax({
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },
            url:'/reviewLike',
            method:'POST',
            data:{
                'review_id':likeReviewId
            },
        })
        
        // 通信が成功したら
        .done(function(data){
            $this.toggleClass('liked');
            $this.next('.like-counter').html(data.review_likes_count);
        })
        
        // 失敗時
        .fail(function(){
        console.log('fail');
        });
    });
    
    
    /**
     * 口コミ削除の注意メッセージ(mypage)
     * 
     */
     $('.reviewdeletebtn').on('click', function(){
         if(confirm('削除するとデータ復旧はできません（投稿画像も同時に削除されます）')){

         }else{
             return false;
         }
     });
});

