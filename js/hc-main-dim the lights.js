(function($){
    $(document).ready(function () {
        $(window).scroll( function () {
            var scroll = $(window).scrollTop();
            if( scroll > 20 ) {
                $('#header-box').addClass('header-box-active');
            } else {
                $('#header-box').removeClass('header-box-active');
            }
        });
    });
})(jQuery);

function isMobile() {
return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
}

if (!isMobile()) {

$(window).bind("scroll", function() {
    if ($(this).scrollTop() > 450) {
        $("#ad-content-start").fadeIn();
    } 
});

}

/* 
* dim the lights project
*/
  
  $("#dim-lights-button").click(function() {
            if ($(this).hasClass('lights-off')) {
                 //When you turn the lights back on fade out the "dim" layer over 500 milliseconds and then remove it
            $('#fade').fadeOut(250, function() {
                    $("#fade").remove();
                    $('#theater').css('z-index', '3')
                    $('#page-header').css('z-index', '2')
                    $('#theater').css('position', 'relative')
                    $('#theater').css('width', '49.7%')
                    $('#video-wrapper').css('width', '66.7%')
                    $('.tptn_posts ul').css('height', '355')
                    $('.hc-widget_sidekick').css('width', '163')
                });
                $(this).text('Dim the lights')
                $(this).removeClass('lights-off')
            }
            else {
                $('#page-header').append('<div id="fade"></div>'); //When you turn the lights off add the "dimmed" layer to the page
                $('#fade').fadeIn(250); //Fade in the "dim" layer over 250 milliseconds
                $(this).text('Bring up the lights')
                $(this).addClass('lights-off')
                $('#theater').css('z-index', '1032')
                $('#page-header').css('z-index', '100')
                $('#theater').css('position', 'relative')
                $('#theater').css('width', '70%')
                $('#video-wrapper').css('width', '66.7%')
                $('.tptn_posts ul').css('height', '555')
                $('.hc-widget_sidekick').css('max-width', '504')
            }
        })
/* vote trial script */ 

/* end vote trial script */

