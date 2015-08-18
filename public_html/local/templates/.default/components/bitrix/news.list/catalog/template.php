<?if(count($arResult['ITEMS'])>0):?>
<div class="products">
	<?foreach ($arResult['ITEMS'] as $key => $item):
		if($item['PREVIEW_PICTURE']['HEIGHT'] > $item['PREVIEW_PICTURE']['WIDTH']):
			if($key % 2 == 0 && $key != 0):?> <div class="product__divider hidden-xs"></div> <?endif;
			?>
		<div class="product product--vertical">
			<div class="row">
				<div class="col-xs-4 col-lg-3">
					<a href="<?=$item['DETAIL_PAGE_URL']?>" class="product__image"><img src="<?=$item['PREVIEW_PICTURE']['SRC']?>"></a>
				</div>
				<div class="col-xs-8 col-lg-9">
					<div class="product__content">
						<div class="product__title">
							<h3><a href="<?=$item['DETAIL_PAGE_URL']?>"><?=$item['NAME']?></a></h3>
						</div>
						<div class="product__description">
							<p><?=$item['~PREVIEW_TEXT']?></p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?
		else:?>
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
		<?
		endif;
	endforeach;?>
</div>
<?endif;?>

<?=($arParams["DISPLAY_BOTTOM_PAGER"]=="Y" ? $arResult["NAV_STRING"]:"")?>
