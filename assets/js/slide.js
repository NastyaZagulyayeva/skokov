function gallery(slider) {
    var slider = slider;
    var link = $(slider).find("#js-list a");
    var bigImage = $(slider).find("#js-bigImage img");
    var bigLink = $(slider).find("#js-bigImage a");
    var next = $(slider).find('#js-next');
    var prev = $(slider).find('#js-prev');

    link.click(function () {
      var images = $(this).find('img');
      var imgSrc = images.attr('src');

      bigImage.attr({
        src: imgSrc
      });

      bigLink.attr({
        href: imgSrc
      });

      $(this).parent().siblings('li').removeClass('active');
      images.parent().parent().addClass('active');
      return false;
    });

    next.click(function () {
      nextSlide();
    });

    prev.click(function () {
      prevSlide();
    });

    function nextSlide() {

      var count = $(slider).find('#js-list .gallery__item').length;
      var n = parseInt($(slider).find('#js-list .gallery__item').index($('.active')) + 1);
      var activeItem = $(slider).find('#js-list .active');
      var nextSrc;

      if (count != n) {
        nextSrc = activeItem.next().find('img').attr('src');
        $(slider).find('#js-list .active').removeClass('active');
        activeItem.next().addClass('active');
      } else {
        nextSrc = $(slider).find('#js-list a').first().find('img').attr('src');
        $(slider).find('#js-list .active').removeClass('active');
        $(slider).find('#js-list .gallery__item').first().addClass('active');
      }
      $(slider).find('#js-bigImage img').attr({
        src: nextSrc
      });
      return false;
    }


    function prevSlide() {
      var n = parseInt($(slider).find('#js-list .gallery__item').index($('.active')) + 1);
      var activeItem = $(slider).find('#js-list .active');
      var prevSrc;

      if (n != 1) {
        prevSrc = activeItem.prev().find('img').attr('src');
        $(slider).find('#js-list .active').removeClass('active');
        activeItem.prev().addClass('active');
      } else {
        prevSrc = $(slider).find('#js-list a:last').find('img').attr('src');
        $(slider).find('#js-list .active').removeClass('active');
        $(slider).find('#js-list .gallery__item:last').addClass('active');
      }
      $(slider).find('#js-bigImage img').attr({
        src: prevSrc
      });
      return false;
    }
}

gallery(".js-gallery");
