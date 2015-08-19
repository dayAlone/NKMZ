(function() {
  this.spinOptions = {
    lines: 13,
    length: 21,
    width: 2,
    radius: 24,
    corners: 0,
    rotate: 0,
    direction: 1,
    color: '#3160b7',
    speed: 1,
    trail: 68,
    shadow: false,
    hwaccel: false,
    className: 'spinner',
    zIndex: 2e9,
    top: '50%',
    left: '50%'
  };

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

  this.getCaptcha = function() {
    return $.get('/include/captcha.php', function(data) {
      console.log(data);
      return setCaptcha(data);
    });
  };

  this.setCaptcha = function(code) {
    $('input[name=captcha_sid], input[name=captcha_code]').val(code);
    return $('.captcha').css('background-image', "url(/include/captcha.php?captcha_sid=" + code + ")");
  };

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
    return initCloseButtons(el);
  };

  this.initCloseButtons = function(el) {
    return $('.page .modal-close, .page .close').one('click', function(e) {
      closeModal(el);
      return e.preventDefault();
    });
  };

  this.initGallery = function() {
    return $('.gallery').elem('item').click(function(e) {
      var elem, gallery, items, options;
      elem = $('.pswp')[0];
      items = $(this).block().data('pictures');
      options = galleryOptions;
      options.index = $(this).index();
      gallery = new PhotoSwipe(elem, PhotoSwipeUI_Default, items, options);
      gallery.init();
      return e.preventDefault();
    });
  };

  this.initGalleries = function() {
    return $('.licence, .album').click(function(e) {
      var elem, gallery, items, options;
      elem = $('.pswp')[0];
      options = galleryOptions;
      if ($(this).parent().hasMod('show-all')) {
        items = $(this).parent().data('pictures');
        options.index = $(this).index();
      } else {
        items = $(this).data('pictures');
      }
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
        loadElement($(this).attr('href'));
      }
      return e.preventDefault();
    });
  };

  this.loadElement = function(href) {
    var $el, block;
    $el = $(".page a[href^='" + href + "']");
    if ($el.length > 0) {
      block = $el.parent();
    }
    block.mod('active', true);
    $('.modal__content').html("").spin(spinOptions);
    if (location.href.split("?")[1]) {
      href = href + "?" + (location.href.split("?")[1]);
    }
    $.get("/ajax" + href, function(data) {
      var title;
      $('.modal__content').html(data);
      title = $(data).find('h2').text();
      if (History.enabled) {
        History.pushState({
          'url': href
        }, title, href);
      }
      document.title = title + " | " + document.title.split(' | ')[1];
      initCloseButtons(block);
      if ($('.gallery').length > 0) {
        return initGallery();
      }
    });
    if ($('.modal__content').is(':hidden')) {
      return openModal(block);
    }
  };

  this.initNews = function() {
    $('.years .dropdown__select').on('change', function() {
      return location.href = $(this).val();
    });
    return $('.news').elem('title').click(function(e) {
      var block;
      block = $(this).block();
      if (!block.hasMod('active')) {
        $('.news').mod('active', false);
        block.mod('active', true);
        loadElement($(this).attr('href'));
      }
      return e.preventDefault();
    });
  };

  this.initServices = function() {
    $('.service').elem('gallery').click(function(e) {
      var elem, gallery, items, options;
      elem = $('.pswp')[0];
      options = galleryOptions;
      items = $(this).data('pictures');
      gallery = new PhotoSwipe(elem, PhotoSwipeUI_Default, items, options);
      gallery.init();
      return e.preventDefault();
    });
    return $('.service').elem('map').click(function(e) {
      var block, coords;
      block = $(this).block();
      if (!block.hasMod('active')) {
        $('.service').mod('active', false);
        block.mod('active', true);
        coords = $(this).data('coords').split(',');
        mark.geometry.setCoordinates(coords);
        mark.properties.set({
          hintContent: block.elem('name').text()
        });
        map.setCenter(coords, map.getZoom(), {
          duration: 300
        });
        openModal(block);
      } else {
        closeModal(block);
      }
      return e.preventDefault();
    });
  };

  this.initScroll = function() {
    return $('.page__content').perfectScrollbar({
      suppressScrollX: true,
      includePadding: true
    });
  };

  this.setFilterValue = function($block, id, text) {
    $block.find('input').prop('checked', false);
    $block.find("input[name='" + id + "']").prop('checked', true);
    $block.find('.dropdown__trigger span').text(text);
    return $block.mod('active', false);
  };

  this.initFilter = function() {
    $('.filter .dropdown__select').on('change', function() {
      var $block, id;
      $block = $(this).block();
      id = $(this).val();
      if (id) {
        $block.elem('trigger').mod('active', false);
        return setFilterValue($block, id, $(this).find('option:selected').text());
      }
    });
    return $('.filter .dropdown__item').click(function(e) {
      var $block, id;
      $block = $(this).block();
      id = $(this).data('id');
      setFilterValue($block, id, $(this).text());
      return e.preventDefault();
    });
  };

  this.initMap = function() {
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
            this.map = new ymaps.Map($map.attr('id'), {
              center: $map.data('coords').split(','),
              zoom: $map.data('zoom'),
              controls: ['geolocationControl', 'zoomControl']
            });
            this.mark = new ymaps.Placemark(map.getCenter(), {
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

  this.delay = function(ms, func) {
    return setTimeout(func, ms);
  };

  this.size = function() {
    var bg, catalogSectionHeight, cookie, height, indexSectionHeight;
    height = $(window).height() - $('.toolbar').outerHeight() - $('.footer').outerHeight() - 15;
    indexSectionHeight = height - $('.index .filter').outerHeight() - 16;
    catalogSectionHeight = height - $('.catalog .filter').outerHeight() - 16;
    cookie = $.cookie('height');
    if (cookie !== height) {
      $.cookie('height', height, {
        expires: 1,
        path: '/'
      });
      $.cookie('index', indexSectionHeight, {
        expires: 1,
        path: '/'
      });
      $.cookie('catalog', catalogSectionHeight, {
        expires: 1,
        path: '/'
      });
    }
    if ($(window).height() > 800 && $(window).width() >= 1024) {
      $('.index .fotorama__stage, .index .fotorama__shaft, .page__content, .page__side').css('min-height', height);
      $('.page__content').css('max-height', height);
      $('.index .section').css('min-height', indexSectionHeight);
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
      $('.catalog .filter').removeAttr('style');
      $('.catalog .section').css('min-height', catalogSectionHeight);
    } else {
      $('.catalog .section, .catalog .filter').removeAttr('style');
    }
    if (this.map) {
      return this.map.container.fitToViewport();
    }
  };

  $(document).ready(function() {
    var resizeTimer, scrollTimer, transTimer;
    delay(500, function() {
      return initScroll();
    });
    delay(300, function() {
      size();
      return $('.index').elem('slider').on("fotorama:show", function() {
        return size();
      }).fotorama();
    });
    if ($.browser.mobile === true) {
      $('body').addClass('mobile');
    }
    $('.dropdown').elem('trigger').click(function(e) {
      return e.preventDefault();
    });
    $('.modal').on('shown.bs.modal', function(e) {
      $('input[name="vacancy"]').val($(e.relatedTarget).parent().find('h2').text());
      return getCaptcha();
    });
    scrollTimer = false;
    $('.params').elem('frame').on('scroll', function() {
      var el;
      clearTimeout(scrollTimer);
      el = $(this);
      return scrollTimer = delay(50, function() {
        if (el.scrollLeft() > 70) {
          el.block().mod('left', true);
        } else {
          el.block().mod('left', false);
        }
        if (el.scrollLeft() + el.width() === el.find('.param').width()) {
          return el.block().mod('right', true);
        } else {
          return el.block().mod('right', false);
        }
      });
    });
    $('.captcha__refresh').click(function(e) {
      getCaptcha();
      return e.preventDefault();
    });
    $('#Feedback form').submit(function(e) {
      var request;
      e.preventDefault();
      request = $(this).serialize();
      return $.post('/include/send.php', request, function(data) {
        console.log(data);
        data = $.parseJSON(data);
        if (data.status === "ok") {
          $('.feedback').elem('form').hide().addClass('hidden');
          return $('.feedback').elem('success').show().removeClass('hidden');
        } else if (data.status === "error") {
          $('input[name=captcha_word]').addClass('parsley-error');
          return getCaptcha();
        }
      });
    });
    $('.dropdown').hoverIntent({
      over: function() {
        return $(this).mod('active', true);
      },
      out: function() {
        var el;
        el = $(this);
        return delay(300, function() {
          return el.mod('active', false);
        });
      }
    }).elem('frame').perfectScrollbar({
      suppressScrollX: true,
      includePadding: true
    });
    $('.file__trigger').click(function(e) {
      $(this).parent().find('input[type=file]').trigger('click');
      return e.preventDefault();
    });
    $('input[type=file]').on('change', function() {
      $('.form .file__trigger').removeClass('error');
      return $('.file__name').text($(this).val().replace(/.+[\\\/]/, ""));
    });
    $('.feedback').elem('form').submit(function(e) {
      var request;
      e.preventDefault();
      request = $(this).serialize();
      return $.post('/include/send.php', request, function(data) {
        data = $.parseJSON(data);
        if (data.status === "ok") {
          $('.feedback').elem('form').hide().addClass('hidden');
          return $('.feedback').elem('success').show().removeClass('hidden');
        } else if (data.status === "error") {
          $('input[name=captcha_word]').addClass('parsley-error');
          return getCaptcha();
        }
      });
    });
    $('#Career .form').submit(function(e) {
      var data;
      data = new FormData(this);
      return $.ajax({
        type: 'POST',
        url: '/include/send.php',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        mimeType: 'multipart/form-data',
        success: function(data) {
          data = $.parseJSON(data);
          if (data.status === "ok") {
            $('#Career .form').hide();
            return $('#Career .success').show();
          } else if (data.status === "error") {
            $('#Career input[name=captcha_word]').addClass('parsley-error');
            return getCaptcha();
          }
        }
      });
    });
    initMap();
    if ($('.services').length > 0) {
      initServices();
    }
    if ($('.content .news').length > 0) {
      initNews();
    }
    if ($('.vacancies').length > 0) {
      initVacancies();
    }
    if ($('.albums').length > 0 || $('.licencies').length > 0) {
      initGalleries();
    }
    if ($('.filter').length > 0) {
      initFilter();
    }
    $('.product').elem('image').byMod('detail').click(function(e) {
      var elem, gallery, items, options;
      elem = $('.pswp')[0];
      items = $(this).data('pictures');
      options = galleryOptions;
      options.index = $(this).index();
      gallery = new PhotoSwipe(elem, PhotoSwipeUI_Default, items, options);
      gallery.init();
      return e.preventDefault();
    });
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
      return $(window).scroll(function() {
        clearTimeout(scrollTimer);
        if (!$('.scroll-fix').hasMod('on')) {
          $('.scroll-fix').mod('on', true);
        }
        return scrollTimer = delay(400, function() {
          return $('.scroll-fix').mod('on', false);
        });
      });
    } else {
      return $('.scroll-fix').remove();
    }
  });

}).call(this);
