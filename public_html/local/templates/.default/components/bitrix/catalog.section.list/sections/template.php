<?if(count($arResult['SECTIONS'])>0):?>
<div class="sections">
  <?foreach($arResult['SECTIONS'] as $section):?>
	<a href="<?=$section['SECTION_PAGE_URL']?>" class="section section--<?=$section['ID']?> <?=(strlen($section['UF_SVG'])==0?"section--no-logo":"")?>">
		<div style="background-image: url(<?=strlen($arParams['PICTURE']) > 0 ? CFile::GetPath($section['DETAIL_PICTURE']) : $section['PICTURE']['SRC']?>)" class="section__image section__image--desktop"></div>
        <div style="background-image: url(<?=CFile::GetPath($section['DETAIL_PICTURE'])?>)" class="section__image section__image--mobile"></div>
        <div class="section__name">
            <div class="section__logo"><?=$section['UF_SVG']?></div>
			<span><?=$section['~NAME']?></span>
		</div>
	</a>
  <?endforeach;?>
</div>
<?endif;?>
