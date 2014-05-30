(function($){
    Drupal.behaviors.showhide = {
        attach: function (context, settings) {

            $("#flow-btn").click(function (){
                var posVar = 0;
                $(".sidebar_left").animate({left: posVar + 'px'});
                $('.slide-box-close').show();
                $('.flow-btn').hide();

            });
            $(".slide-box-close").click(function (){
                var posVar = '-'+297+'px';
                $(".sidebar_left").animate({left: posVar});
                $('.flow-btn').show();
                $('.slide-box-close').hide();
            });
        }
    };
})(jQuery);
