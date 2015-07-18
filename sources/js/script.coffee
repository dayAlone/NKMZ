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

	if $('.gallery').length > 0
		initGallery()

	$('.page .modal-close, .page .close').one 'click', (e)->
		if el.length > 0
			closeModal el
		e.preventDefault()

@initGallery = ->

	$('.gallery').elem('item').click (e)->
		elem          = $('.pswp')[0];
		items         = $(this).block().data 'pictures'
		options       = galleryOptions
		#options.index = $('.picture__small--active').index()

		gallery = new PhotoSwipe elem, PhotoSwipeUI_Default, items, options
		gallery.init()

		e.preventDefault()

@initLicencies = ->

	$('.licence').click (e)->
		elem          = $('.pswp')[0];
		items         = $(this).data 'pictures'
		options       = galleryOptions
		#options.index = $('.picture__small--active').index()

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
			openModal block
		e.preventDefault()

@initNews = ->
	$('.news').elem('title').click (e)->
		block = $(this).block()
		if !block.hasMod 'active'
			$('.news').mod 'active', false
			block.mod 'active', true
			openModal block
		e.preventDefault()

@initServices = ->
	$('.service').elem('map').click (e)->
		block = $(this).block()
		if !block.hasMod 'active'
			$('.service').mod 'active', false
			block.mod 'active', true
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
					mark = new ymaps.Placemark map.getCenter(), { hintContent: $map.data('text') }, { preset: "twirl#nightDotIcon" }
					@map.geoObjects.add mark
					@map.container.fitToViewport()
@size = ->
	height = $(window).height() - $('.toolbar').outerHeight() - $('.footer').outerHeight() - 15
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
		console.log(1)
		$('.catalog .filter').removeAttr('style')
		$('.catalog .section').css 'min-height', height - $('.catalog .filter').outerHeight() - 15
	else
		$('.catalog .section, .catalog .filter').removeAttr 'style'
	if @map
		@map.container.fitToViewport()

$('.index').elem('slider').on("fotorama:show", ->
	size()
).fotorama();

#7283343
delay 500, ->
	initScroll()

delay 300, ()->
	size()

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
