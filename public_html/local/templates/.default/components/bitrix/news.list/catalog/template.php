<?if(count($arResult['ITEMS'])>0):?>
<div class="products">
	<?foreach ($arResult['ITEMS'] as $item):?>
		<div class="product">
			<div class="row product__title">
				<div class="col-md-7 col-lg-6">
					<h3><a href="<?=$item['DETAIL_PAGE_URL']?>"><?=$item['NAME']?></a></h3>
				</div>
				<div class="col-md-5 col-lg-6 right"><a href="<?=$item['DETAIL_PAGE_URL']?>" class="product__image"><img src="<?=$item['PREVIEW_PICTURE']['SRC']?>"></a>
				</div>
			</div>
			<div class="product__description">
				<p><?=$item['~PREVIEW_TEXT']?></p>
			</div>
		</div>
	<?endforeach;?>
</div>
<?endif;?>

<?=($arParams["DISPLAY_BOTTOM_PAGER"]=="Y" ? $arResult["NAV_STRING"]:"")?>
