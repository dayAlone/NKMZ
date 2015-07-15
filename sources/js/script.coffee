@end = 'transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd'
@map = undefined

@pointerEventsSupported = (->
	style = document.createElement('a').style;
	style.cssText = 'pointer-events:auto';
	return style.pointerEvents == 'auto';
)();

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
						zoom: $map.data('zoom')
					}
					mark = new ymaps.Placemark map.getCenter(), { hintContent: $map.data('text') }, { preset: "twirl#nightDotIcon" }
					map.geoObjects.add mark

@size = ->
	if $(window).height() > 800 && $(window).width() >= 1024
		height = $(window).height() - $('.toolbar').outerHeight() - $('.footer').outerHeight() - 15
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
			initScroll()
		$('.slider__content').css 'marginTop', -$('.news-list').byMod('slider').height()/2 - 20
	else
		$('.page__content').perfectScrollbar 'destroy'
		$('.slider__content').removeAttr 'style'

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

mapInit()

transTimer = undefined
$('.page__content, .page__side').on @end, ->
	clearTimeout transTimer
	transTimer = delay 200, ()->
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
