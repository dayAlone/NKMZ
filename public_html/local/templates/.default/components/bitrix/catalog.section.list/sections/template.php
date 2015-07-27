<?if(count($arResult['SECTIONS'])>0):?>
<div class="sections">
  <div class="row">
	  <?foreach($arResult['SECTIONS'] as $section):?>
	  <div class="col-xs-6 col-sm-3">
		<a href="<?=$section['SECTION_PAGE_URL']?>" class="section section--<?=$section['ID']?> <?=(strlen($section['UF_SVG'])==0?"section--no-logo":"")?>">
			<div style="background-image: url(<?=$section['PICTURE']['SRC']?>)" class="section__image"></div>
            <div class="section__logo"><?=$section['UF_SVG']?></div>
			<div class="section__name">
				<span><?=$section['~NAME']?></span>
			</div>
		</a>
	  </div>
	  <?endforeach;?>
  </div>
</div>
<?endif;?>
