(function() {
  var resizeTimer, scrollTimer, transTimer;

  this.end = 'transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd';

  this.map = void 0;

  this.pointerEventsSupported = (function() {
    var style;
    style = document.createElement('a').style;
    style.cssText = 'pointer-events:auto';
    return style.pointerEvents === 'auto';
  })();

  this.delay = function(ms, func) {
    return setTimeout(func, ms);
  };

  this.initScroll = function() {
    return $('.page__content').perfectScrollbar({
      suppressScrollX: true,
      includePadding: true
    });
  };

  this.mapInit = function() {
    if ($('[data-map]').length > 0) {
      return $('[data-map]').each(function() {
        var $map, lang;
        $map = $(this);
        lang = $(this).data('lang');
        if (lang.length === 0) {
          lang = "ru_RU";
        }
        return $.getScript("http://api-maps.yandex.ru/2.1/?lang=" + lang, function() {
          return ymaps.ready(function() {
            var mark;
            this.map = new ymaps.Map($map.attr('id'), {
              center: $map.data('coords').split(','),
              zoom: $map.data('zoom')
            });
            mark = new ymaps.Placemark(map.getCenter(), {
              hintContent: $map.data('text')
            }, {
              preset: "twirl#nightDotIcon"
            });
            return map.geoObjects.add(mark);
          });
        });
      });
    }
  };

  this.size = function() {
    var bg, height;
    if ($(window).height() > 800 && $(window).width() >= 1024) {
      height = $(window).height() - $('.toolbar').outerHeight() - $('.footer').outerHeight() - 15;
      $('.index .fotorama__stage, .index .fotorama__shaft, .page__content, .page__side').css('min-height', height);
      $('.page__content').css('max-height', height);
      $('.index .section').css('min-height', height - $('.index .filter').outerHeight() - 15);
    } else {
      bg = $('.page__side').css('background-image');
      $('.index .fotorama__stage, .index .fotorama__shaft, .index .section, .page__content, .page__side').removeAttr('style');
      $('.page__side').css('background-image', bg);
    }
    if ($(window).width() >= 1024) {
      if ($('.page__content').data('perfect-scrollbar')) {
        $('.page__content').perfectScrollbar('update');
      } else {
        initScroll();
      }
      $('.slider__content').css('marginTop', -$('.news-list').byMod('slider').height() / 2 - 20);
    } else {
      $('.page__content').perfectScrollbar('destroy');
      $('.slider__content').removeAttr('style');
    }
    if (this.map) {
      return this.map.container.fitToViewport();
    }
  };

  $('.index').elem('slider').on("fotorama:show", function() {
    return size();
  }).fotorama();

  delay(500, function() {
    return initScroll();
  });

  delay(300, function() {
    return size();
  });

  mapInit();

  transTimer = void 0;

  $('.page__content, .page__side').on(this.end, function() {
    clearTimeout(transTimer);
    return transTimer = delay(200, function() {
      return size();
    });
  });

  resizeTimer = void 0;

  $(window).resize(function() {
    clearTimeout(resizeTimer);
    return resizeTimer = delay(300, function() {
      return size();
    });
  });

  if (pointerEventsSupported) {
    scrollTimer = false;
    $(window).scroll(function() {
      clearTimeout(scrollTimer);
      if (!$('.scroll-fix').hasMod('on')) {
        $('.scroll-fix').mod('on', true);
      }
      return scrollTimer = delay(400, function() {
        return $('.scroll-fix').mod('on', false);
      });
    });
  } else {
    $('.scroll-fix').remove();
  }

}).call(this);
