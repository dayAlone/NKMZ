<?if(count($arResult['ITEMS'])>0):?>
<div data-height="641" data-width="100%" data-loop="true" data-transition-duration="600" data-transition="dissolve" data-autoplay="true" data-nav="false" class="index__slider slider">
	<?foreach ($arResult['ITEMS'] as $item):?>
		<div class="slider__item">
			<div style="background-image: url(<?=$item['PREVIEW_PICTURE']['SRC']?>), url(<?=$item['PREVIEW_PICTURE']['SMALL']?>)" class="slider__image"></div>
			<div class="slider__content">
			  <h2 class="slider__title"><?=$item['~NAME']?></h2>
			  <div class="slider__text">
				<p><?=$item['~PREVIEW_TEXT']?></p>
			  </div>
			  <?if(strlen($item['PROPERTIES']['LINK']['VALUE'])>0):?>
			  	<a href="<?=$item['PROPERTIES']['LINK']['VALUE']?>" class="slider__button"><?=(LANGUAGE_ID=='ru'?'Подробнее':'Read more')?></a>
			  <?endif;?>
			</div>
		</div>
	<?endforeach;?>
</div>
<?endif;?>
