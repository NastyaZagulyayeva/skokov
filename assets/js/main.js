$('.grid').masonry({
    itemSelector: '.grid-item',
    columnWidth: '.grid-sizer',
  });

$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    navText : ["",""],
    responsiveClass:true,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        382: {
            items:2,
            nav:true
        },
        540:{
            items:3,
            nav:true
        },
        768:{
            items:4,
            nav:true
        },
        854:{
            items:5,
            nav:true
        },
        992: {
            items:6,
            nav: true
        },
        1200: {
            items: 7,
            nav: true
        }
    }
});
          