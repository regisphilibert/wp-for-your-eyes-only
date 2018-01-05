(function($) {
    $(document).ready(function () {
        if(typeof stickies != 'undefined'){
            $.each(stickies, function(index, value){
                Sticky_class.render(value)
            })
        }
    });
})(jQuery);


var $ = jQuery;
var Sticky_class = {
    render : function (data) {
        var Sticky_container = $('.ar-Sticky__container')
        Data = $('<div />')
        $.each(data, function(index, value){
            Data.append('<p>' + index + ' : '+ value +'</p>')
        })
        
        if(!Sticky_container.length){
            Sticky_container = $('<div class="ar-Sticky__container" />');
            Sticky_container.appendTo('body'); 
        }
        Data.appendTo(Sticky_container)
    }
}

var Sticky = function(data) {
    return Sticky_class.render(data);
}