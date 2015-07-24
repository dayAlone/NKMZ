<?if(count($arResult) > 0):?>
<div class="toolbar__nav">
	<div class="nav">
		<?foreach ($arResult as $item):?>
			<a href="<?=$item['LINK']?>" class="nav__item <?=($item['SELECTED']?'nav__item--active':'')?>"><?=$item['TEXT']?></a>
		<?endforeach;?>
	</div>
</div>
<?endif;?>
