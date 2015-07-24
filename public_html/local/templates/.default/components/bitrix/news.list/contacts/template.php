<?if(count($arResult['ITEMS'])>0):?>
<div class="contacts">
	<?foreach ($arResult['ITEMS'] as $item):?>
		<div class="contact">
		  <div class="contact__content">
			<div class="row">
			  <div class="col-sm-4 col-lg-3"><span class="contact__title"><?=$item['NAME']?></span></div>
			  <div class="col-sm-4 col-lg-3"><span class="contact__name"><?=$item['PROPERTIES']['NAME']['~VALUE']?></span></div>
			  <div class="col-sm-4 col-lg-6 sm-right lg-left">
				<div class="row contact__connect">
				  <div class="col-lg-6"><span class="contact__phone"><?=$item['PROPERTIES']['PHONE']['~VALUE']?></span></div>
				  <div class="col-lg-6"><span class="contacts__email">
					  <?if(strlen($item['PROPERTIES']['EMAIL']['~VALUE'])>0):?>
					  <a href="<?=$item['PROPERTIES']['EMAIL']['~VALUE']?>"><?=$item['PROPERTIES']['EMAIL']['~VALUE']?></a>
					  <?endif;?>
				  </span></div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	<?endforeach;?>
</div>
<?endif;?>
<?$this->SetViewTarget('sidebar');?>
	<div id="map" data-coords="<?=COption::GetOptionString("grain.customsettings", 'coords')?>" data-zoom="15" data-map data-lang="<?=(LANGUAGE_ID=='ru'?"ru_RU":"en_US")?>" data-text="<?=COption::GetOptionString("grain.customsettings", 'name_'.LANGUAGE_ID)?>"></div>
<?$this->EndViewTarget();?>
