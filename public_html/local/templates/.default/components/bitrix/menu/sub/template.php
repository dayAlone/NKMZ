<?
if(count($arResult) > 0):?>
<div class="page__nav">
	<div class="nav">
		<?foreach ($arResult as $item):?>
			<a href="<?=$item['LINK']?>" class="nav__item <?=($item['SELECTED']?'nav__item--active':'')?>"><?=html_entity_decode($item['TEXT'])?></a>
		<?endforeach;?>
	</div>
</div>
<?endif;?>
