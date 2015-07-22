@spinOptions =
	lines     : 13
	length    : 21
	width     : 2
	radius    : 24
	corners   : 0
	rotate    : 0
	direction : 1
	color     : '#3160b7'
	speed     : 1
	trail     : 68
	shadow    : false
	hwaccel   : false
	className : 'spinner'
	zIndex    : 2e9
	top       : '50%'
	left      : '50%'

@end = 'transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd'

@map = undefined

@galleryOptions =
	history : false
	focus   : false
	shareEl : false

@pointerEventsSupported = (->
	style = document.createElement('a').style;
	style.cssText = 'pointer-events:auto';
	return style.pointerEvents == 'auto';
)();

@closeModal = (el)->
	$('.page').elem('modal').on(end, (->
		$(this).hide().off(end)
	)).mod 'active', false
	$('.content').mod 'modal', false

	if el.length > 0
		el.mod 'active', false

@openModal = (el)->
	$('.page').elem('modal').show()
	delay 100, ->
		$('.page').elem('modal').mod 'active', true
	$('.content').mod 'modal', true

	initCloseButtons el

@initCloseButtons = (el)->
	$('.page .modal-close, .page .close').one 'click', (e)->
		closeModal el
		e.preventDefault()

@initGallery = ->
	$('.gallery').elem('item').click (e)->
		elem          = $('.pswp')[0];
		items         = $(this).block().data 'pictures'
		options       = galleryOptions
		options.index = $(this).index()
		gallery = new PhotoSwipe elem, PhotoSwipeUI_Default, items, options
		gallery.init()

		e.preventDefault()

@initAlbums = ->
	$('.album').click (e)->
		elem    = $('.pswp')[0];
		options = galleryOptions
		items   = $(this).data 'pictures'

		gallery = new PhotoSwipe elem, PhotoSwipeUI_Default, items, options
		gallery.init()

		e.preventDefault()

@initLicencies = ->
	$('.licence').click (e)->
		elem    = $('.pswp')[0];
		options = galleryOptions
		if $(this).parents('.licencies').hasMod 'show-all'
			items = $(this).parents('.licencies').data 'pictures'
			options.index = $(this).index()
		else
			items = $(this).data 'pictures'

		gallery = new PhotoSwipe elem, PhotoSwipeUI_Default, items, options
		gallery.init()

		e.preventDefault()

@initVacancies = ->
	#$('#Career').modal()
	$('.vacancy').elem('title').click (e)->
		block = $(this).block()
		if !block.hasMod 'active'
			$('.vacancy').mod 'active', false
			block.mod 'active', true
			loadElement $(this).attr 'href'
		e.preventDefault()

@loadElement = (href)->
	$el = $(".page a[href^='#{href}']")

	block = $el.parent() if $el.length > 0
	block.mod 'active', true
	$('.modal__content').html("").spin spinOptions

	href = "#{href}?#{location.href.split("?")[1]}" if location.href.split("?")[1]
	$.get "/ajax" + href, (data)->
		$('.modal__content').html data
		title = $(data).find('h2').text()
		if History.enabled
			History.pushState { 'url' : href }, title, href
		document.title = title + " | " + document.title.split(' | ')[1]
		initCloseButtons block
		initGallery() if $('.gallery').length > 0


	if $('.modal__content').is ':hidden'
		openModal block

@initNews = ->
	$('.news').elem('title').click (e)->
		block = $(this).block()
		if !block.hasMod 'active'
			$('.news').mod 'active', false
			block.mod 'active', true
			loadElement $(this).attr 'href'
		e.preventDefault()

@initServices = ->
	$('.service').elem('gallery').click (e)->
		elem          = $('.pswp')[0];
		options       = galleryOptions
		items = $(this).data 'pictures'
		gallery = new PhotoSwipe elem, PhotoSwipeUI_Default, items, options
		gallery.init()

		e.preventDefault()

	$('.service').elem('map').click (e)->
		block = $(this).block()
		if !block.hasMod 'active'
			$('.service').mod 'active', false
			block.mod 'active', true
			coords = $(this).data('coords').split(',')
			mark.geometry.setCoordinates coords
			mark.properties.set { hintContent: block.elem('name').text() }
			map.setCenter coords, map.getZoom(), { duration: 300 }
			openModal block
		else
			closeModal block
		e.preventDefault()

@delay = (ms, func) -> setTimeout func, ms

@initScroll = ->
	$('.page__content').perfectScrollbar({suppressScrollX: true, includePadding: true})

@mapInit = ->
	if $('[data-map]').length > 0
		$('[data-map]').each ->
			$map = $(this)
			lang = $(this).data('lang')
			lang = "ru_RU" if lang.length == 0
			$.getScript "http://api-maps.yandex.ru/2.1/?lang=#{lang}", ->
				ymaps.ready ()->
					@map = new ymaps.Map $map.attr('id'), {
						center: $map.data('coords').split(',')
						zoom: $map.data('zoom'),
						controls: ['geolocationControl', 'zoomControl']
					}
					@mark = new ymaps.Placemark map.getCenter(), { hintContent: $map.data('text') }, { preset: "twirl#nightDotIcon" }
					@map.geoObjects.add mark
					@map.container.fitToViewport()
@size = ->
	height = $(window).height() - $('.toolbar').outerHeight() - $('.footer').outerHeight() - 15 - $('#panel').height()
	if $(window).height() > 800 && $(window).width() >= 1024
		$('.index .fotorama__stage, .index .fotorama__shaft, .page__content, .page__side').css 'min-height', height
		$('.page__content').css 'max-height', height
		$('.index .section').css 'min-height', height - $('.index .filter').outerHeight() - 15
	else
		bg = $('.page__side').css 'background-image'
		$('.index .fotorama__stage, .index .fotorama__shaft, .index .section, .page__content, .page__side').removeAttr 'style'
		$('.page__side').css 'background-image', bg

	if $(window).width() >= 1024
		if $('.page__content').data('perfect-scrollbar')
			$('.page__content').perfectScrollbar 'update'
		else
			$('.page__content').perfectScrollbar({suppressScrollX: true, includePadding: true})

		if $('.page__modal').data('perfect-scrollbar')
			$('.page__modal').perfectScrollbar 'update'
		else
			$('.page__modal').perfectScrollbar({suppressScrollX: true, includePadding: true})

		$('.slider__content').css 'marginTop', -$('.news-list').byMod('slider').height()/2 - 20
	else
		$('.page__content, .page__modal').perfectScrollbar 'destroy'
		$('.slider__content').removeAttr 'style'

	if $(window).width() > 1200
		if $(window).height() > 800
			$('.catalog .section, .catalog .filter').css 'min-height', height
	else if $(window).width() > 700
		$('.catalog .filter').removeAttr('style')
		$('.catalog .section').css 'min-height', height - $('.catalog .filter').outerHeight() - 15
	else
		$('.catalog .section, .catalog .filter').removeAttr 'style'
	if @map
		@map.container.fitToViewport()

delay 500, ->
	initScroll()

delay 300, ()->
	size()
	$('.index').elem('slider').on("fotorama:show", ->
		size()
	).fotorama();

$('.dropdown').hoverIntent({
	over: ->
		$(this).mod 'active', true
	out: ->
		el = $(this)
		el.mod 'active', false

}).elem('frame').perfectScrollbar({suppressScrollX: true, includePadding: true})

mapInit()

if $('.services').length > 0
	initServices()

if $('.licencies').length > 0
	initLicencies()

if $('.content .news').length > 0
	initNews()

if $('.vacancies').length > 0
	initVacancies()

if $('.albums').length > 0
	initAlbums()

transTimer = []
$('.page__content, .page__side, .page__modal, .catalog .filter').on @end, ->
	c = $(this).attr('class').length
	clearTimeout transTimer[c]
	transTimer[c] = delay 200, ()->
		size()

resizeTimer = undefined
$(window).resize ->
	clearTimeout resizeTimer
	resizeTimer = delay 300, ()->
		size()

if pointerEventsSupported
	scrollTimer = false
	$(window).scroll ->
		clearTimeout scrollTimer
		if !$('.scroll-fix').hasMod 'on'
			$('.scroll-fix').mod 'on', true
		scrollTimer = delay 400, ()->
			$('.scroll-fix').mod 'on', false
else
	$('.scroll-fix').remove()
