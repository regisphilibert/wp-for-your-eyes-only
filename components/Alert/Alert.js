(function($) {
    $(document).ready(function () {

        $(document).on('click', ".debug-alert-title", function(){
            if(!$(this).parents('.debug-alert').hasClass('expended')){
                $(this).next("div").slideToggle(250);
                $(this).parent('.debug-alert').toggleClass('minimized');
            }
        });

        $(document).on('click', ".close-alert", function(){
            alert_box = $(this).parents('.debug-alert');
            if(alert_box.hasClass('expended')){
                alert_box.removeClass('expended');
            }
            else{
                if(alert_box.hasClass('debug-alert-js')){
                    alert_box.parents('.debug-alert-container').fadeOut(150, function(){
                        $(this).remove();
                    });
                }
                else{
                    alert_box.animate({opacity:0}, 250, function(){
                        $(this).slideUp(250);
                    });
                }
            }
        });

        $(document).on('click', ".expend-alert", function(){
            alert_box = $(this).parents('.debug-alert');
            alert_box.toggleClass('expended');
        });
    });
})(jQuery);