<?
$item = &$arResult;
$gallery = $arResult["PROPERTIES"]['GALLERY']['VALUE'];
?>
<input type="hidden" name="id" value="<?=$item['ID']?>">
<div class="right xxl-margin-bottom"><a href="#" class="close"><?=$arParams['CLOSE']?></a></div>
<div class="text">
	<?if(strlen($item['ACTIVE_FROM']) > 0):?>
	<small><?=date('d.m.Y', strtotime($item['ACTIVE_FROM']))?></small>
	<?else:?>
	<small><?=$arParams['TEXT']?></small>
	<?endif;?>
	<h2 class="l-margin-bottom xs-margin-top"><?=$item['NAME']?></h2>

	<?=$item['~DETAIL_TEXT']?>

	<?=html_entity_decode($arParams['AFTER'])?>
</div>
<?if($gallery):?>
<div data-pictures='<?=json_encode($gallery)?>' class="gallery">
  <div class="gallery__content">
	  <?foreach($gallery as $image):?>
	  	<a style="background-image: url(<?=$image['small']?>)" href="#" class="gallery__item"></a>
	  <?endforeach;?>
  </div>
<?endif;?>
