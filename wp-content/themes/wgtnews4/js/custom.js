jQuery('#news_slider').slick({
    infinite: true,
    slidesToShow: 4,
    arrows: true,
    slidesToScroll: 1,
    autoplay: true,
    appendArrows: '.inbtns2',
    prevArrow: "<button type='button' class='prev'></button>",
    nextArrow: "<button type='button' class='next'></button>",
    autoplaySpeed: 1500,
    responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 575,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 421,
            settings: {
                slidesToShow: 1,
            }
        }
    ]
  });