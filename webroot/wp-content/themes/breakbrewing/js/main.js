
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
        $('#secondary').on(window.transitionEnd, resetContentHeight);
    }

    /**
     * resetContentHeight
     * @param event : the event from the transitionend event
     * 
     * description
     */
    function resetContentHeight(event){
        $('#secondary').off(window.transitionEnd);
        $('#content').removeAttr('style');
    }

    /**
     * launchBeerdrawer
     * @param event : the object from the click
     * 
     * send out the beer drawer
     */
    function launchBeerdrawer(event){
        event.preventDefault();

        var $activeBeer = $(this).parents('.beer-tile'),
            drawerHeight = $('.beerdrawer', $activeBeer).outerHeight() + 40,
            windowWidth = $(window).width(),
            primaryHeight = $('#primary').height(),
            tileWidth = $activeBeer.width() + 40,
            tileHeight = $activeBeer.height() + 40,
            tileOffset = $activeBeer.offset(),
            tileTransform = 'translateX(' + (tileWidth - 20) + 'px)';

        if( (tileOffset.left + tileWidth) > (windowWidth - tileWidth + 40) ){
            tileTransform = 'translateY(' + tileHeight + 'px)';

            if( (tileOffset.top + tileHeight) > (primaryHeight - tileHeight + 40) ){
                $('#primary').css('paddingBottom', drawerHeight + 'px');
            }
        }


        $activeBeer.addClass('active').find('.beerdrawer').css('transform', tileTransform);

        $activeBeer.siblings().addClass('inactive');
        
    }
    /**
     * closeBeerdrawer
     * @param event : the object from the click
     * 
     * close the beer drawer
     */
    function closeBeerdrawer(event){
        event.preventDefault();

        $active = $(this).parents('.beer-tile').removeClass('active').find('.beerdrawer').removeAttr('style');

        $('.beerdrawer').on(window.transitionEnd, beerdrawerAnimationEnd);
    }


    /**
     * beerdrawerAnimationEnd
     * @param event : the object from the transitionend event
     * 
     * after the beerdrawer's closing animation finishes
     */
    function beerdrawerAnimationEnd(event){
        $('.beer-tile').removeClass('inactive');
        $('.beerdrawer').off(window.transitionEnd);
        $('#primary').removeAttr('style');
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

        if( $(window).width() > 640 ){
            var windowHeight = $(window).height();

            $('#content').height(windowHeight);    
        }

        $('#secondary').addClass('active');
    }


    function headerInteraction(){

        // Hide Header on on scroll down
        var didScroll;
        var lastScrollTop = 0;
        var delta = 0;
        var navbarHeight = $('.site-header').outerHeight();

        $(window).scroll(function(event){
            didScroll = true;
        });

        setInterval(function() {
            if (didScroll) {
                hasScrolled();
                didScroll = false;
            }
        }, 10);

        function hasScrolled() {
            var st = $(this).scrollTop();


            // Make sure they scroll more than delta
            if(Math.abs(lastScrollTop - st) <= delta)
                return;

            // If they scrolled down and are past the navbar, add class .header-up.
            // This is necessary so you never see what is "behind" the navbar.
            if (st > 50){
                // Scroll Down
                $('.site-header').removeClass('header-down').addClass('header-up');
            } else {
                // Scroll Up
                $('.site-header').removeClass('header-up').addClass('header-down');
                
            }

            lastScrollTop = st;
        }

    }


    /**
     * getInstagrams 
     * 
     * get instagram photoz
     */
    function getInstagrams(){
        // userId (breakbrwing) - 1560914241,
        // userId (braican) - 1184943897
        var feed = new Instafeed({
            target      : 'instabeer',
            get         : 'user',
            userId      : 1560914241,
            clientId    : '060417a9263c454ea491f6f9952b0707',
            accessToken : '1560914241.060417a.28d8b80460814baabd01236cc4783a30',
            template    : '<a class="instaphoto" target="_blank" href="{{link}}"><img src="{{image}}"></a>',
            success     : function(json){
                console.log(json);

                // var markup = '';

                // $.each(json.data, function(index, photo) {
                //     markup += '<a class="instaphoto" href="' + + '"><img src="' + photo.images.thumbnail.url + '"></a>';
                // });
            }
        });
        feed.run();
    }


    // -------------------------------
    // public
    //
    BREAKBREWING.init = function(){

        $(document).on('click', resetZones);

        $('.js-launch-beerdrawer').on('click', launchBeerdrawer);
        $('.js-close-beerdrawer').on('click', closeBeerdrawer);

        $('.js-launch-content-drawer').on('click', launchContentdrawer);

        headerInteraction();

        getInstagrams();

    }


    // -------------------------------
    // DOM ready
    //
    $(document).ready(function(){
        BREAKBREWING.init();
    });


})(window.BREAKBREWING = window.BREAKBREWING || {}, jQuery);


