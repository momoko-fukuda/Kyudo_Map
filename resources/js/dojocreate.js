
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
    
});

