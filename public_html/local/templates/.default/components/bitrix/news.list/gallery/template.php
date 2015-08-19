<?if(count($arResult['ITEMS'])>0):?>
<div class="albums <?=($arResult['SHOW_ALL']?"albums--show-all":"")?>" <?=($arResult['SHOW_ALL']?"data-pictures='".json_encode($arResult['GALLERY'])."'":"")?>>
	<?
	if(count($arResult['ITEMS']) > 1):
		foreach ($arResult['ITEMS'] as $item):?>
		<a href="#" class="album" data-pictures='<?=json_encode($item["PROPERTIES"]['GALLERY']['VALUE'])?>' style="background-image: url(<?=$item["PREVIEW_PICTURE"]['SRC']?>)">
			<span><?=$item['NAME']?></span>
		</a>
		<?endforeach;
	else:
		foreach ($arResult['ITEMS'][0]["PROPERTIES"]['GALLERY']['VALUE'] as $item):?>
		<a href="#" class="album" style="background-image: url(<?=$item["src"]?>)">
		</a>
		<?endforeach;
	endif;?>
</div>
<?endif;?>

<?=($arParams["DISPLAY_BOTTOM_PAGER"]=="Y" ? $arResult["NAV_STRING"]:"")?>
