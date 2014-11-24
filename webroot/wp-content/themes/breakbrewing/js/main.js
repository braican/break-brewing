
//
// namespace - BREAKBREWING
//


/**
 * transitionend
 * @link https://gist.github.com/O-Zone/7230245
 * set a global variable equal to the browser's transitionend property
 */
(function (window) {
    var transitions = {
        'transition': 'transitionend',
        'WebkitTransition': 'webkitTransitionEnd',
        'MozTransition': 'transitionend',
        'OTransition': 'otransitionend'
    },
    elem = document.createElement('div');
  
    for(var t in transitions){
        if(typeof elem.style[t] !== 'undefined'){
            window.transitionEnd = transitions[t];
            break;
        }
    }
})(window);

(function(BREAKBREWING, $, undefined){


    /**
     * resetZones
     * @param event : the object from the click
     * 
     * reset all the live zones
     */
    function resetZones(event){
        $('#secondary').removeClass('active');
    }

    /**
     * launchBeerdrawer
     * @param event : the object from the click
     * 
     * load up the "about" text and load it into the beerdrawer
     */
    function launchBeerdrawer(event){
        event.preventDefault();

        var $activeBeer = $(this).parents('.beer-tile').addClass('active'),
            tileWidth = $activeBeer.width();

        $activeBeer.siblings().addClass('inactive');

        $('.beerdrawer').on(window.transitionEnd, beerdrawerAnimationEnd);
    }
    /**
     * closeBeerdrawer
     * @param event : the object from the click
     * 
     * load up the "about" text and load it into the beerdrawer
     */
    function closeBeerdrawer(event){
        event.preventDefault();

        var $activeBeer = $(this).parents('.beer-tile').removeClass('active');

        $activeBeer.siblings().removeClass('inactive');
    }


    /**
     * beerdrawerAnimationEnd
     * @param event : the object from the transitionend event
     * 
     * remove the close
     */
    function beerdrawerAnimationEnd(event){
        
    }


    /**
     * launchContentdrawer
     * @param event : the object from the click
     * 
     * display the secondary content
     */
    function launchContentdrawer(event){
        event.preventDefault();
        event.stopPropagation();
        $('#secondary').addClass('active');
    }

    // -------------------------------
    // public
    //
    BREAKBREWING.init = function(){

        $(document).on('click', resetZones);

        $('.js-launch-beerdrawer').on('click', launchBeerdrawer);
        $('.js-close-beerdrawer').on('click', closeBeerdrawer);

        $('.js-launch-content-drawer').on('click', launchContentdrawer);

    }


    // -------------------------------
    // DOM ready
    //
    $(document).ready(function(){
        BREAKBREWING.init();
    });


})(window.BREAKBREWING = window.BREAKBREWING || {}, jQuery);