
jQuery(document).ready(function () {      


    // Nav Toggler
    jQuery(".navbar_toggle").click(function(){
        var $this = jQuery(this);
        var target = jQuery('.navbar');
        if (jQuery(target).hasClass('active')) {
            jQuery(target).removeClass('active');
            jQuery('.header_overlay').fadeOut('slow');
        } else {
            jQuery(target).addClass('active')
            jQuery('.header_overlay').fadeIn('slow')
        }
    });

    // search bar
    jQuery('.site_search > span').click(function(){
        jQuery(this).parent().toggleClass('active');
    });

    // owl causes
    jQuery('.owl-testimonials').owlCarousel({
        autoplay:true,
        autoplayHoverPause:true,
        loop:true,
        dots: false,
        nav:false,
        responsive: {
          0: {
            items: 2
          },
          480: {
            items: 2
          },
          767: {
            items: 3
          },
          1000: {
            items: 5
          }
        }
    })
    

    //Back to top
    if (jQuery('.backToTop').length) {
        var scrollTrigger = 100, // px
            backToTop = function () {
                var scrollTop = jQuery(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    jQuery('.backToTop').addClass('show');
                } else {
                    jQuery('.backToTop').removeClass('show');
                }
            };
        backToTop();
        jQuery(window).on('scroll', function () {
            backToTop();
        });
        jQuery('.backToTop').on('click', function (e) {
            e.preventDefault();
            jQuery('html,body').animate({
                scrollTop: 0
            }, 700);
        });         
    }
    
});
        
    

jQuery(function(){
    var date = moment().format('MMMM , dddd D , YYYY');
    jQuery('#date').html(date);
})

