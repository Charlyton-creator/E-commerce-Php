$(document).ready(function(){
    $('#menu').click(function(){
        $(this).toggleClass('fa-times');
        $('.navbar').toggleClass('nav-toggle')
    });
    $(window).on('scroll load',function(){
       $('#menu').removeClass('fa-times');
       $('.navbar').removeClass('nav-toggle');
       if($(window).scrollTop()>68){
           $('header .header-2').addclass('header-active');
       }else{
        $('header .header-2').removeclass('header-active');
       }
    });
    $('.boutique-slider').owlCarousel({
        items:1,
        nav:true,
        dots:false,
        autoplay:true,
        autoplayTimeout:
        
    });
});