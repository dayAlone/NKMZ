<?
$item = &$arResult;
$gallery = $arResult["PROPERTIES"]['GALLERY']['VALUE'];
?>
<div class="products">
  <div class="product">
	  <div class="center xl-margin-bottom">
	  		<div href="#" class="product__image"><img src="<?=$item['PREVIEW_PICTURE']['SRC']?>"></div>
	  </div>

	<div class="product__description text">
		<?=$item['~DETAIL_TEXT']?>
        <div class="params">
            <?
            foreach ($item['PROPERTIES']['TABLE']['VALUE'] as $key => $row):
                if($row['prop_title'] == "Y" && $key != 0):?></div><?endif;?>
                <div class="param <?=($row['prop_title'] == "Y"?"param--title":"")?>">    
                <?
                unset($row['prop_title']);
                foreach ($row as $k => $el) if(strlen($el) == 0) unset($row[$k]);
                foreach ($row as $k => $el):
                ?>
                    <div class="param__col" style="width: <?=100/count($row)?>%"><?=$el?></div>
                <?
                endforeach;?>
                </div>
                <?
            endforeach;
            ?>
        </div>
	</div>
  </div>
</div>
<?if($gallery):?>
<div data-pictures='<?=json_encode($gallery)?>' class="gallery">
  <div class="gallery__content">
	  <?foreach($gallery as $image):?>
	  	<a style="background-image: url(<?=$image['small']?>)" href="#" class="gallery__item"></a>
	  <?endforeach;?>
  </div>
<?endif;?>
