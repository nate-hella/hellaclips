
jQuery( document ).ready(function( $ ) {

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

function loadXMLDoc()
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("div1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","hellahype-loop.php",true);
xmlhttp.send();
}


// show ans hide nav menu
$(function() {
  $('.toggle-nav').click(function() {
    // Calling a function in case you want to expand upon this.
    toggleNav();
  });
});

function toggleNav() {
if ($('#offcanvas, #main').hasClass('show-nav')) {
  // Do things on Nav Close
  $('#offcanvas, #main').removeClass('show-nav');
} else {
  // Do things on Nav Open
  $('#offcanvas, #main').addClass('show-nav');
  $('#search-wrapper').removeClass('show-nav');
}
//$('#site-wrapper').toggleClass('show-nav');
}



// show and hide search
$(function() {
  $('.toggle-search').click(function() {
    // Calling a function in case you want to expand upon this.
    toggleSearch();
  });
});

function toggleSearch() {
if ($('#search-wrapper').hasClass('show-nav')) {
  // Do things on Nav Close
  $('#search-wrapper').removeClass('show-nav');
} else {
  // Do things on Nav Open
  $('#search-wrapper').addClass('show-nav');
  $('#offcanvas, #main').removeClass('show-nav');
}
//$('#site-wrapper').toggleClass('show-nav');
}

});