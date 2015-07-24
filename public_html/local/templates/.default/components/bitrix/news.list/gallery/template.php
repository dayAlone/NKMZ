<?if(count($arResult['ITEMS'])>0):?>
<div class="albums">
	<?foreach ($arResult['ITEMS'] as $item):?>
	<a href="#" class="album" data-pictures='<?=json_encode($item["PROPERTIES"]['GALLERY']['VALUE'])?>' style="background-image: url(<?=$item["PREVIEW_PICTURE"]['SRC']?>)">
		<span><?=$item['NAME']?></span>
	</a>
	<?endforeach;?>
</div>
<?endif;?>

<?=($arParams["DISPLAY_BOTTOM_PAGER"]=="Y" ? $arResult["NAV_STRING"]:"")?>
