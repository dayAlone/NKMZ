<?if(count($arResult['ITEMS'])>0):?>
<div class="text xxl-margin-bottom">
  <p>Сегодня в нашей компании открыты следующие вакансии:</p>
</div>

<div class="vacancies">
	<?foreach ($arResult['ITEMS'] as $item):?>
		<div class="vacancy"><a href="<?=$item['DETAIL_PAGE_URL']?>" class="vacancy__title"><?=$item['NAME']?></a></div>
	<?endforeach;?>
</div>
<?endif;?>

<?=($arParams["DISPLAY_BOTTOM_PAGER"]=="Y" ? $arResult["NAV_STRING"]:"")?>
