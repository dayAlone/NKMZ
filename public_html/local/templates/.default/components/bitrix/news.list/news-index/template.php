<?if(count($arResult['ITEMS'])>0):?>
<div class="news-list hidden-md hidden-lg news-list--mobile">
  <div class="news-list__title">
	<div class="row">
	  <div class="col-xs-6"><?=(LANGUAGE_ID=='ru'?"Новости":"News")?></div>
	  <div class="col-xs-6 right"><a href="/press/" class="news-list__more"><?=(LANGUAGE_ID=='ru'?"К другим новостям":"More news")?></a></div>
	</div>
  </div>
  <div class="row">
	<?foreach ($arResult['ITEMS'] as $item):?>
		<div class="col-sm-6">
			<div class="news">
			  <div class="news__date"><?=date('d.m.Y', strtotime($item['ACTIVE_FROM']))?></div>
			  <a href="<?=$item['DETAIL_PAGE_URL']?>" class="news__title"><?=$item['NAME']?></a>
			</div>
		</div>
	<?endforeach;?>
</div>
<?endif;?>
