<?if(count($arResult['ITEMS'])>0):?>
<div class="partners">
	<?foreach ($arResult['ITEMS'] as $item):?>
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
            <div class="partner">
				<img src="<?=$item['PREVIEW_PICTURE']['SRC']?>" alt="" />
            </div>
		</div>
	<?endforeach;?>
</div>
<?endif;?>
