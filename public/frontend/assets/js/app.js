$(function () {
  // navbar
  $(".navbar-toggler").on('click', function () {
    $(".fa-bars-staggered").toggleClass("fa-xmark");
  });
  // sticky navbar
  $(window).on("scroll", function () {
    var scroll = $(window).scrollTop();
    if (scroll >= 50) {
      $(".navbar").addClass("navbg");
    } else {
      $(".navbar").removeClass("navbg");
    }
  });

  // colr switcher
  // show switcher icon
  $(".color-switchericon").on('click', function () {
    $(".color-switcher").toggleClass("showcolorpalate");
  })



  $(".colorbtn").each(function (params) {
    $(this).on('click', function (params) {
      var color = $(this).attr("data-color");
      document.documentElement.style.setProperty("--main-color", color);
    })
  })
});





// banner animate text
var typed = new Typed(".runtext", {
  strings: [
    "MEHEDI HASSAN JIBON",
    "GRAPHICS DESIGNER",
    "WEB DEVELOPER",
    "LARAVEL DEVELOPER",
  ],
  smartBackspace: true,
  typeSpeed: 100,
  startDelay: 100,
  backSpeed: 100,
  backDelay: 1000,
  loop: true,
  loopCount: Infinity,
});


// about animate text
var typed = new Typed(".aboutruntext", {
  strings: [
    "MEHEDI HASSAN JIBON",
    "GRAPHICS DESIGNER",
    "WEB DEVELOPER",
    "LARAVEL DEVELOPER",
  ],
  smartBackspace: true,
  typeSpeed: 100,
  startDelay: 100,
  backSpeed: 100,
  backDelay: 1000,
  loop: true,
  loopCount: Infinity,
});


// owl carousle client
$(".owl-carousel").owlCarousel({
  loop: true,
  margin: 10,
  nav: false,
  loop: true,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 1,
    },
    1000: {
      items: 1,
    },
  },
});




