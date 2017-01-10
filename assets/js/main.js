$( document ).ready(function() {
    

    /* Mobile Navigation */
    var menuRight = document.getElementById( 'cbp-spmenu-s2' ),
    		showRightPush = document.getElementById( 'showRightPush' ),
    		body = document.body,
            nav = document.getElementById( 'nav' );

    $("#showRightPush").click(function() {
    	classie.toggle( this, 'active' );
        $(".hamburger").toggleClass('close');
        classie.toggle( nav, 'left');
        if (navigator.userAgent.indexOf('Safari') && !navigator.userAgent.indexOf('Chrome')) {
            classie.toggle( nav, 'cbp-spmenu-push-toleft');
        } else {
            // Nope
        }        
    	classie.toggle( body, 'cbp-spmenu-push-toleft' );
    	classie.toggle( menuRight, 'cbp-spmenu-open' );
    	disableOther( 'showRightPush' );
    });

    function disableOther( button ) {
    	if( button !== 'showRightPush' ) {
    		classie.toggle( showRightPush, 'disabled' );
    	}
    }


    /* Show &amp; Hide mobile subnav */
    $('#locaties').click(function(e) {
        $(this).toggleClass('active');
        $('#locaties .arrow').toggleClass('switch');
        $('ul.subnav').slideToggle();
        e.preventDefault(); // Prevents the href to work
    });

    /* Submenu */
    $('ul li a.locations').click(function(e) {
        e.preventDefault();
        $(this).toggleClass('active');
        $('.dropdown').slideToggle();
    });

    /* Navigation scroll animation */
    $(window).scroll(function(){
      var sticky = $('nav'),
          searchbar = $('.search-container'),
          search = $('.search'),
          scroll = $(window).scrollTop();


      if  (scroll >= 50) sticky.addClass('fixed');
      if  (scroll >= 1) searchbar.slideUp();
      if  (scroll >= 1) search.removeClass('searchclose');
      else sticky.removeClass('fixed');
    });

    /* Google maps lock */
    $('.google-maps .iframe-area').on('click', function() {
        $(this).toggleClass('lock');
        $('.google-maps iframe').toggleClass('no-event');
    });


    // Interactive Searchbar
    $('#search').click(function() {
        $(window).scrollTop(0);
        $('.search-container').slideToggle();
        $('.search').toggleClass('searchclose');
    });

    if($('.search-container').css('display') == 'block') {
        $('.search').addClass('searchclose');
    }


    // filter
    $("#btn-all").click(function(e) {
        $(".filter-cultuur").fadeIn(500);
        $(".filter-kunst").fadeIn(500);
        $(this).toggleClass('active');
        $('#btn-cultuur').removeClass('active');
        $('#btn-kunst').removeClass('active');
        e.preventDefault();
    });

    $("#btn-cultuur").click(function(e) {
        $(".filter-kunst").fadeOut(500);
        setTimeout(function(){
          $(".filter-cultuur").fadeIn(500);
        }, 500);
        $(this).toggleClass('active');
        $('#btn-all').removeClass('active');
        $('#btn-kunst').removeClass('active');
        e.preventDefault();
    });

    $("#btn-kunst").click(function(e) {
        $(".filter-cultuur").fadeOut(500);
        setTimeout(function(){
          $(".filter-kunst").fadeIn(500);
        }, 500);
        $(this).toggleClass('active');
        $('#btn-all').removeClass('active');
        $('#btn-cultuur').removeClass('active');
        e.preventDefault();
    });

    // textarea height change
    $("#txtarea-grow").keyup(function(e) {
        $(this).height(0);
        $(this).height(this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth")));
    });

    // Agenda active switch 
    $(".col-14 span").click(function() {
        $('.col-14 *').removeClass('active');
        $(this).toggleClass('active');
    });

    // Agenda more info slidetoggle
    $("#all_events .row").click(function() {
        $(this).find('p').slideToggle();
    });
    
});
