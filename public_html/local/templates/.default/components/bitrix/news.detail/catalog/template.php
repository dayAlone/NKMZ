<?
$item = &$arResult;
$gallery = $arResult["PROPERTIES"]['GALLERY']['VALUE'];
$json = array(array("src"=>$item['PREVIEW_PICTURE']['SRC'], "w"=>$item['PREVIEW_PICTURE']['WIDTH'],"h"=>$item['PREVIEW_PICTURE']['HEIGHT']));
?>
<div class="products">
  <div class="product">
    <?if($item['PREVIEW_PICTURE']['HEIGHT'] < $item['PREVIEW_PICTURE']['WIDTH']):?>
    <div class="center xl-margin-bottom">
    	<a href="#" class="product__image product__image--detail" data-pictures='<?=json_encode($json)?>'><img src="<?=$item['PREVIEW_PICTURE']['SRC']?>" alt="<?=$item['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT']?>"></a>
    </div>
    <?else:?>
    <div class="row">
        <div class="col-xs-2 center">
            <a href="#" class="product__image product__image--detail" data-pictures='<?=json_encode($json)?>'>
                <img src="<?=$item['PREVIEW_PICTURE']['SRC']?>" alt="<?=$item['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT']?>">
            </a>
        </div>
        <div class="col-xs-10">
    <?endif;?>

	<div class="product__description text">
		<?=$item['~DETAIL_TEXT']?>
        <p><a href='#Feedback' data-toggle='modal' class='button'>Запрос информации</a></p>
        <div class="params">
            <div class="params__frame">
            <?
            foreach ($item['PROPERTIES']['TABLE']['VALUE'] as $key => $row):?>
                <div class="param <?=($row['prop_title'] == "Y"?"param--title":"")?>">
                <?
                if(isset($row['prop_title'])) unset($row['prop_title']);
                foreach ($row as $k => $el) if(strlen($el) == 0) unset($row[$k]);
                foreach ($row as $k => $el):
                ?>
                    <div class="param__col" style="width: <?=100/count($row)?>%"><span><?=html_entity_decode($el)?></span></div>
                <?
                endforeach;?>
                </div>
                <?
            endforeach;
            ?>
            </div>
        </div>
	    <?=html_entity_decode(nl2br($item['PROPERTIES']['TEXT']['VALUE']['TEXT']))?>
        <? if (strlen($item['PROPERTIES']['SEO']['VALUE']['TEXT']) > 0): ?>
        <div class='product__seo'>
            <?=html_entity_decode(nl2br($item['PROPERTIES']['SEO']['VALUE']['TEXT']))?>
        </div>
        <?endif;?>
    </div>

    <?if($item['PREVIEW_PICTURE']['HEIGHT'] > $item['PREVIEW_PICTURE']['WIDTH']):?>
        </div>
    </div>
    <?endif;?>
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
