
$( function()
{
    console.log('jQuery');
    
    
});

$(function(){
    $('.hidehours').hide();

    $('.fadehourbtn').click(function(){
        $('.hidehours').toggle();
    });
    
    
    
    /**
     * dojos/create.blade.phpにて、画像データの項目を増やす減らすコード
     */
    $('.append_imgs').click(function(){
        
        let clonecode = $('.imgbox:last').clone(true);

      clonecode.insertAfter($('.imgbox:last'));

    });
    
    $('.remove_imgs').click( function(){
        
        $(this).parents('.imgbox').remove();

        
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

     

    

    // /**
    //  * dojos/create.blade.phpにて、新規登録ボタン押した後
    //  * 営業時間のデータを配列化して取得
    //  * submit送信
    //  */
    // $('#btn_submit').click(function(){
        
    //     // 配列を入れる箱
    //     let imgarry = [];
        
        
    //     // divの.hourboxデータを繰り返し配列に入れている
    //     $('.imgbox').each(function(){
    //         let imgvalue = $(this).find('.img').val();
    //         imgarry.push(imgvalue);
    //     });
    
        
    //     // hourarry内の配列をJSON形式に変更し、隠しフォーム「json_businesshour」に投入
    //     $('#json_imgs').val(JSON.stringify(imgarry));
        
    //     // フォーム送信
    //     // $("#form_dojocreate").submit();
        
    // });
    
});

