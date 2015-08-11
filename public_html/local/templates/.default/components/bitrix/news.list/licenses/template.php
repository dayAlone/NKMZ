<?if(count($arResult['ITEMS'])>0):?>
<div class="licencies <?=($arResult['SHOW_ALL']?"licencies--show-all":"")?>" <?=($arResult['SHOW_ALL']?"data-pictures='".json_encode($arResult['GALLERY'])."'":"")?>>
	<?foreach ($arResult['ITEMS'] as $item):
		?>
	<a href="#" <?=(!$arResult['SHOW_ALL']?"data-pictures='".json_encode($item["PROPERTIES"]['GALLERY']['VALUE'])."'":"")?> class="licence">
		<div class="licence__image"><img src="<?=$item["PROPERTIES"]['GALLERY']['VALUE'][0]['src']?>"></div>
		<span class="licence__name"><?=$item['NAME']?></span>
	</a>
	<?endforeach;?>
</div>
<?endif;?>
