
$( function()
{
    console.log('jQuery');
    
    
});

$(function(){
    

    /**
     * dojos/create.blade.phpにて、営業時間の項目を増やす減らすコード
     */
    $('.append_businesshours').click(function(){
        
        let clonecode = $('.hourbox:last').clone(true);

       clonecode.insertAfter($('.hourbox:last'));

    });
    
    $('.remove_businesshours').click( function(){
        
        $(this).parents('.hourbox').remove();

        
    });
    
    

    /**
     * dojos/create.blade.phpにて、新規登録ボタン押した後
     * 営業時間のデータを配列化して取得
     * submit送信
     */
    $('#btn_submit').click(function(){
        
        // 配列を入れる箱
        let hourarry = [];
        
        
        // divの.hourboxデータを繰り返し配列に入れている
        $('.hourbox').each(function(){
            let fromvalue = $(this).find('.from').val();
            let tovalue = $(this).find('.to').val();
            let fromtovalues = {from:fromvalue, to:tovalue};
            hourarry.push(fromtovalues);
        });
    
        
        // hourarry内の配列をJSON形式に変更し、隠しフォーム「json_businesshour」に投入
        $('#json_businesshour').val(JSON.stringify(hourarry));
        
        // フォーム送信
        $("#form_dojocreate").submit();
        
    });
    
});

