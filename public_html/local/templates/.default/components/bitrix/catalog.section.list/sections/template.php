<?if(count($arResult['SECTIONS'])>0):?>
<div class="sections">
  <?foreach($arResult['SECTIONS'] as $section):?>
	<a href="<?=$section['SECTION_PAGE_URL']?>" class="section section--<?=$section['ID']?> <?=(strlen($section['UF_SVG'])==0?"section--no-logo":"")?>">
		<div style="background-image: url(<?=$section['PICTURE']['SRC']?>)" class="section__image"></div>
        <div class="section__name">
            <div class="section__logo"><?=$section['UF_SVG']?></div>
			<span><?=$section['~NAME']?></span>
		</div>
	</a>
  <?endforeach;?>
</div>
<?endif;?>
