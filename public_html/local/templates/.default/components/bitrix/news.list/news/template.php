<?if(count($arResult['ITEMS'])>0):?>
<div class="news-list <?=$arParams['CLASS']?>">
	<?foreach ($arResult['ITEMS'] as $item):?>
		<div class="news">
		  <div class="news__date"><?=date('d.m.Y', strtotime($item['ACTIVE_FROM']))?></div>
		  <a href="<?=$item['DETAIL_PAGE_URL']?>" class="news__title"><?=$item['NAME']?></a>
		</div>
	<?endforeach;?>
	<?if($arParams["SHOW_MORE"]=="Y"):?>
	<a href="/press/" class="news-list__more"><?=(LANGUAGE_ID=='ru'?"К другим новостям":"More news")?></a>
	<?endif;?>
</div>
<?endif;?>

<?=($arParams["DISPLAY_BOTTOM_PAGER"]=="Y" ? $arResult["NAV_STRING"]:"")?>
