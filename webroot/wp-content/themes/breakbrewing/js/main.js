
//
// namespace - BREAKBREWING
//

(function(BREAKBREWING, $, undefined){


    /**
     * launchBeerdrawer
     * @param event : the object from the click
     * 
     * load up the "about" text and load it into the beerdrawer
     */
    function launchBeerdrawer(event){
        event.preventDefault();

        var $activeBeer = $(this).parents('.beer-tile').addClass('active'),
            about = $(this).siblings('.about-the-beer').html();
        
        $('.beerdrawer', $activeBeer).addClass('active').html(about);
    }

    // -------------------------------
    // public
    //
    BREAKBREWING.init = function(){

        $('.js-launch-beerdrawer').on('click', launchBeerdrawer);
    }


    // -------------------------------
    // DOM ready
    //
    $(document).ready(function(){
        BREAKBREWING.init();
    });


})(window.BREAKBREWING = window.BREAKBREWING || {}, jQuery);