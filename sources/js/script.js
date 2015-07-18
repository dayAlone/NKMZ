(function() {
  var resizeTimer, scrollTimer, transTimer;

  this.end = 'transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd';

  this.map = void 0;

  this.galleryOptions = {
    history: false,
    focus: false,
    shareEl: false
  };

  this.pointerEventsSupported = (function() {
    var style;
    style = document.createElement('a').style;
    style.cssText = 'pointer-events:auto';
    return style.pointerEvents === 'auto';
  })();

  this.closeModal = function(el) {
    $('.page').elem('modal').on(end, (function() {
      return $(this).hide().off(end);
    })).mod('active', false);
    $('.content').mod('modal', false);
    if (el.length > 0) {
      return el.mod('active', false);
    }
  };

  this.openModal = function(el) {
    $('.page').elem('modal').show();
    delay(100, function() {
      return $('.page').elem('modal').mod('active', true);
    });
    $('.content').mod('modal', true);
    if ($('.gallery').length > 0) {
      initGallery();
    }
    return $('.page .modal-close, .page .close').one('click', function(e) {
      if (el.length > 0) {
        closeModal(el);
      }
      return e.preventDefault();
    });
  };

  this.initGallery = function() {
    return $('.gallery').elem('item').click(function(e) {
      var elem, gallery, items, options;
      elem = $('.pswp')[0];
      items = $(this).block().data('pictures');
      options = galleryOptions;
      gallery = new PhotoSwipe(elem, PhotoSwipeUI_Default, items, options);
      gallery.init();
      return e.preventDefault();
    });
  };

  this.initLicencies = function() {
    return $('.licence').click(function(e) {
      var elem, gallery, items, options;
      elem = $('.pswp')[0];
      items = $(this).data('pictures');
      options = galleryOptions;
      gallery = new PhotoSwipe(elem, PhotoSwipeUI_Default, items, options);
      gallery.init();
      return e.preventDefault();
    });
  };

  this.initVacancies = function() {
    return $('.vacancy').elem('title').click(function(e) {
      var block;
      block = $(this).block();
      if (!block.hasMod('active')) {
        $('.vacancy').mod('active', false);
        block.mod('active', true);
        openModal(block);
      }
      return e.preventDefault();
    });
  };

  this.initNews = function() {
    return $('.news').elem('title').click(function(e) {
      var block;
      block = $(this).block();
      if (!block.hasMod('active')) {
        $('.news').mod('active', false);
        block.mod('active', true);
        openModal(block);
      }
      return e.preventDefault();
    });
  };

  this.initServices = function() {
    return $('.service').elem('map').click(function(e) {
      var block;
      block = $(this).block();
      if (!block.hasMod('active')) {
        $('.service').mod('active', false);
        block.mod('active', true);
        openModal(block);
      } else {
        closeModal(block);
      }
      return e.preventDefault();
    });
  };

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
              zoom: $map.data('zoom'),
              controls: ['geolocationControl', 'zoomControl']
            });
            mark = new ymaps.Placemark(map.getCenter(), {
              hintContent: $map.data('text')
            }, {
              preset: "twirl#nightDotIcon"
            });
            this.map.geoObjects.add(mark);
            return this.map.container.fitToViewport();
          });
        });
      });
    }
  };

  this.size = function() {
    var bg, height;
    height = $(window).height() - $('.toolbar').outerHeight() - $('.footer').outerHeight() - 15;
    if ($(window).height() > 800 && $(window).width() >= 1024) {
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
        $('.page__content').perfectScrollbar({
          suppressScrollX: true,
          includePadding: true
        });
      }
      if ($('.page__modal').data('perfect-scrollbar')) {
        $('.page__modal').perfectScrollbar('update');
      } else {
        $('.page__modal').perfectScrollbar({
          suppressScrollX: true,
          includePadding: true
        });
      }
      $('.slider__content').css('marginTop', -$('.news-list').byMod('slider').height() / 2 - 20);
    } else {
      $('.page__content, .page__modal').perfectScrollbar('destroy');
      $('.slider__content').removeAttr('style');
    }
    if ($(window).width() > 1200) {
      if ($(window).height() > 800) {
        $('.catalog .section, .catalog .filter').css('min-height', height);
      }
    } else if ($(window).width() > 700) {
      console.log(1);
      $('.catalog .filter').removeAttr('style');
      $('.catalog .section').css('min-height', height - $('.catalog .filter').outerHeight() - 15);
    } else {
      $('.catalog .section, .catalog .filter').removeAttr('style');
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

  $('.dropdown').hoverIntent({
    over: function() {
      return $(this).mod('active', true);
    },
    out: function() {
      var el;
      el = $(this);
      return el.mod('active', false);
    }
  }).elem('frame').perfectScrollbar({
    suppressScrollX: true,
    includePadding: true
  });

  mapInit();

  if ($('.services').length > 0) {
    initServices();
  }

  if ($('.licencies').length > 0) {
    initLicencies();
  }

  if ($('.content .news').length > 0) {
    initNews();
  }

  if ($('.vacancies').length > 0) {
    initVacancies();
  }

  transTimer = [];

  $('.page__content, .page__side, .page__modal, .catalog .filter').on(this.end, function() {
    var c;
    c = $(this).attr('class').length;
    clearTimeout(transTimer[c]);
    return transTimer[c] = delay(200, function() {
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
