<?if(count($arResult['ITEMS'])>0):?>
<div class="services text">
    <div class="services__title visible-lg">
        <div class="row">
          <div class="col-lg-3"><?=GetMessage("COMPANY");?></div>
          <div class="col-lg-3"><?=GetMessage("SERVICES");?></div>
          <div class="col-lg-3"><?=GetMessage("CONTACTS");?></div>
          <div class="col-lg-3"><?=GetMessage("DIRECTOR");?></div>
        </div>
    </div>
	<?foreach ($arResult['ITEMS'] as $item):?>
	<div class="service">
	  <div class="service__content">
		<div class="row">
		  <div class="col-sm-3 hidden-lg service__title"><?=GetMessage("COMPANY");?></div>
		  <div class="col-sm-9 col-lg-3">
              <span class="service__name"><?=$item['NAME']?></span>
              <?
              if($item["PROPERTIES"]['GALLERY']['VALUE']):?>
                <br><a href="#" class="service__gallery" data-pictures='<?=json_encode($item["PROPERTIES"]['GALLERY']['VALUE'])?>'><?=GetMessage("GALLERY");?></a>
              <?endif;?>
		  </div>
		  <div class="service__divider hidden-lg"></div>
		  <div class="col-sm-3 hidden-lg service__title"><?=GetMessage("SERVICES");?></div>
		  <div class="col-sm-9 col-lg-3"><span><?=html_entity_decode($item['PROPERTIES']['SERVICES']['VALUE']['TEXT'])?></span>
		  </div>
		  <div class="service__divider hidden-lg"></div>
		  <div class="col-sm-3 hidden-lg service__title"><?=GetMessage("CONTACTS");?></div>
		  <div class="col-sm-9 col-lg-3">
			  <span><?=$item['PROPERTIES']['ADDRESS']['VALUE']['TEXT']?><br>
			  <a href="#" data-coords="<?=$item['PROPERTIES']['COORDS']['VALUE']?>" class="service__map"><?=GetMessage('MAP')?></a><br>
			  <?=GetMessage('PHONE')?>: <?=$item['PROPERTIES']['PHONE']['~VALUE']?></span>
		  </div>
		  <div class="service__divider hidden-lg"></div>
		  <div class="col-sm-3 hidden-lg service__title"><?=GetMessage("DIRECTOR");?></div>
		  <div class="col-sm-9 col-lg-3"><span><?=$item['PROPERTIES']['DIRECTOR']['~VALUE']?></span>
		  </div>
		  <div class="service__divider hidden-lg"></div>
		</div>
	  </div>
	</div>
	<?endforeach;?>
</div>
<?endif;?>

<?=($arParams["DISPLAY_BOTTOM_PAGER"]=="Y" ? $arResult["NAV_STRING"]:"")?>

<?$this->SetViewTarget('modal');?>
	<a href="#" class="modal-close">Скрыть карту</a>
	<div id="map" data-coords="56.11400541, 54.28644567" data-zoom="15" data-map data-lang="ru_RU" data-text="ООО «НКМЗ-Групп»"></div>
<?$this->EndViewTarget();?>
