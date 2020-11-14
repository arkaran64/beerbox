// transition sticky navbar

$(document).ready(function () {
    $(window).scroll(function () {
        if (this.scrollY > 20) {
            $(".navbar").addClass("sticky");
            $(".goTop").fadeIn();
        } else {
            $(".navbar").removeClass("sticky");
            $(".goTop").fadeOut();
        }
    });

    // apparition menu lateral

    $('.menu-toggler').click(function () {
        $(this).toggleClass("active");
        $(".navbar-menu").toggleClass("active");
    });

});


//slider            
  $(".slider").slick({
      slidesToShow: 3,
      dots: true,
      arrows: true,
      autoplay: true,
      autoplayspeed: 1000,
      centerMode: true,
     
    });
   


