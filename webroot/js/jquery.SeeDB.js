(function($) { // block scope
    $.fn.SeeDB = function($options){
        
        $plugin = {
          name: 'SeeDB',
          version: 0.1
        }

        $config = {
            controller: 'seedb',
            action: 'index',
            data: null
        };
        
        if ($options) $.extend($config, $options);
        
        $this = $(this);
        $data = $config.data;
        
        process = {
            refresh : function(){
                $.getScript('/js/jquery.SeeDB.js');
            },
            run : function(reference){
                alert(reference);
                $.ajax({
                      type: "GET"
                    , url: '/seedb/run/'+$index+'/true'
                    // , data: "command="+$content
                    , success: function(msg) {
                        $('#footer').html(msg);
                    //process.refresh(); // refresh triggers
                    }
                    , error: function() {
                        alert('fail');
                    }
                });
            }
        }
        
        return this.each(function(){
            switch ($config.action){
                case 'run':
////                default:
                    alert($data.index);
                    break;
            }
            return false;
        });
    }
})(jQuery);

$(function(){
    var isbn = {
          name : 'isbn'
        , target: '.openlibrary .content'
        , reference: '#BookIsbn10'
        , url: '/seedb/execute'
    }
    var focus = null;
    // Not a hotkey, but is used to determine what field is currently focused.
    
    $('.command .go').click(function(){
        $this = $(this);
        $index = $('.command .go').index($this);
        $content = $($this.parent('.command').find('.text')[$index]).text();
        
        $(this).SeeDB({controller:'seedb',action:'run',data:{index:$index}});
    });
    
});