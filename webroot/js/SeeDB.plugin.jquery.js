(function($) { // block scope

    $.fn.seedb.defaults = {
          name: "SeeDB", version: 0.1
    }
    $.fn.seedb = function($options){
        $this = $(this);
        settings = jQuery.extend($.fn.seedb.defaults, $options);
        process = {


        }

        return this.each(function(){
            
        });
    }

})(jQuery);