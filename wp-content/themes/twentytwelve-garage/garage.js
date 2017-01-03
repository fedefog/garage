$(document).ready(function(){

    $('.menu-item-has-children').addClass("dropdown");
    $('.menu-item-has-children a:first-child').addClass("dropdown-toggle");
    $('.menu-item-has-children .sub-menu').addClass("dropdown-menu");
    $('.contenido.menu-item-has-children a').first().attr("data-toggle", "dropdown");
    $('#menu-ft .contenido.menu-item-has-children a').first().attr("data-toggle", "dropdown");
    $('#carousel-twitter').fadeTo(1,0);
    

    var start = false;

    setInterval(function() {
        if(start == false){
            $('.tweets').cycle({ 
            fx:      'fade', 
            next:   '#next-tweet', 
            prev:   '#prev-tweet', 
            speed:    800, 
            timeout:  5000 
            });
            $('#carousel-twitter').fadeTo("fast", 1);
            start = true;
        }
    }, 1500);

    $('#vimeo-preview a').click(function (event){
	    event.preventDefault();
	    $('#vimeo-preview').addClass("anim-top");
        $('.video-nav').addClass("oculto");
	    setTimeout(function() {
        $('#vimeo-video').addClass("anim-bottom");
        $('.video-nav').removeClass("oculto");
    	}, 400);
	});

    /* LOAD MORE HL */
    var counter = 0;
    var scroll_height = 1600;
    $('.home .load-container.first .load-more').click(function (event){
        event.preventDefault();
        //$(this).fadeOut();
        $('.highlights.olds').addClass("show" + counter);
        $('body,html').animate({
        scrollTop: $(document).height()
        }, 800);
        if (counter == 2) {
            $(this).addClass("no-more");
        }
        counter++;
    });

    /*CONTENIDO*/

    $('.contenido.menu-item-has-children .dropdown-toggle:nth-child(1)').click(function (event){
        event.preventDefault();
        $('#menu-item-17.dropdown').toggleClass("open");
    });

    $('#menu-ft .contenido.menu-item-has-children .dropdown-toggle:nth-child(1)').click(function (event){
        event.preventDefault();
        $('#menu-ft .contenido.dropdown').toggleClass("open");
    });

    /* COMENTARIOS */

    $('.show-comments').click(function (event){
        event.preventDefault();
        $('#comments-container').fadeIn();
    });

    $('.show-form-comments').click(function (event){
        event.preventDefault();
        $('#comments-form-container').fadeIn();
    });

    /* VIDEOS HOME */

    var width_tablet = $( window ).width(); 

    if (width_tablet > 992 ) {

        $('.arrows .next').click(function (event){
            event.preventDefault();
            $('.slider-videos').addClass("right");
            });
            $('.arrows .prev').click(function (event){
            event.preventDefault();
            $('.slider-videos').removeClass("right");
        });

    } else {

        /*$('.arrows .next').click(function (event){
            event.preventDefault();
            $('.slider-videos').addClass("right-t");
            });
            $('.arrows .prev').click(function (event){
            event.preventDefault();
            $('.slider-videos').removeClass("right-t");
        });*/

    };

});

$( window ).resize(function() {
  var width_tablet_t = $( window ).width(); 
  if (width_tablet_t < 992 ) {
    $('.slider-videos').removeClass("right");
  };

});

