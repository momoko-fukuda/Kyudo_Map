
$( function()
{
    console.log('jQuery');
    
});

$(function(){
    
    /**
     * dojos/create.blade.phpにて、営業時間の項目を増やすコード
     */
    $('#append_businesshours').click(function(){
        let clonecode = $('.hourbox:last').clone(true);
        
        let cloneno = clonecode.attr('data-formno');
        let cloneno2 = parseInt(cloneno) + 1;
        
        
        clonecode.attr('data-formno', cloneno2);
        
        
        let namecode = clonecode.find('input.from').attr('name');
        namecode = namecode.replace(/from¥[[0-9]{1,2}/g, 'from[' + cloneno2);
        clonecode.find('input.from').attr('name', namecode);
        
        let namecode2 = clonecode.find('input.to').attr('name');
        namecode2 = namecode2.replace(/to¥[[0-9]{1,2}/g, 'to[' + cloneno2);
        clonecode.find('input.to').attr('name', namecode2);
        
       clonecode.insertAfter($('.hourbox:last'));


    });
    
    $('#remove_businesshours').click( function(){
        $(this).parents('.hourbox').remove();
        
        let scount = 0;
        
        $('.hourbox').each(function(){
            
            
            $(this).attr('data-formno', scount);
            
            let name = $('input.from', this).attr('name');
            name = name.replace(/from¥[[0-9]{1,2}/g, 'from[' + scount);
            $('input.from', this).attr('name', name);
            
            let name2 = $('input.to', this).attr('name');
            name2 = name2.replace(/to¥[[0-9]{1,2}/g, 'to[' + scount);
            $('input.to', this).attr('name', name2);
            
            scount += 1;
            
        });


    });
    
    

    /**
     * dojos/create.blade.phpにて、新規登録ボタン押した後
     * 営業時間のデータを配列化して取得
     * submit送信
     */
    $('#btn_submit').click(function(){
            
        let fromtovalues =$('input[name ="from"], input[name = "to"]').serializeArray();
            
        let jsonvalues = JSON.stringify(fromtovalues);

        $("#form_dojocreate").submit();
    });
    
});

