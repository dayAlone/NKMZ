<?require($_SERVER['DOCUMENT_ROOT'].'/include/header.php');
$APPLICATION->SetPageProperty('body_class', "catalog");
?>
<div class="row">
  <div class="col-lg-8">
      <?
        $IBLOCK = (LANGUAGE_ID=='ru' ? 3 : 12);
        $IBLOCK_CODE = "content_".LANGUAGE_ID;
        ob_start();

        $APPLICATION->IncludeComponent("bitrix:catalog.smart.filter", "filter",
          array(
              "IBLOCK_TYPE"         => $IBLOCK_CODE,
              "IBLOCK_ID"           => $IBLOCK,
              "CACHE_TYPE"          => "A",
              "CACHE_TIME"          => "36000",
              "SECTION_ID"          => 0,
              "FILTER_NAME"         => "arCatalogFilter"
          )
        );
        $content = ob_get_contents();
        ob_end_clean();
        $APPLICATION->AddViewContent('filter',$content);

        if(!isset($_REQUEST['ELEMENT_CODE']) && !isset($_REQUEST['SECTION_CODE']) && !isset($_REQUEST['set_filter']) && !@defined("ERROR_404")):
        	$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "sections", array(
			    "IBLOCK_TYPE"  => $IBLOCK_CODE,
			    "IBLOCK_ID"    => $IBLOCK,
			    "TOP_DEPTH"    => "1",
			    "CACHE_TYPE"   => "A",
			    "CACHE_TIME"   => "36000",
                "SECTION_USER_FIELDS" => array('UF_SVG')
			),
			false
			);
        else:
      ?>
          <div class="page__content">
              <div class="page__title">
                <h1><?=$APPLICATION->ShowTitle();?></h1>
              </div>
              <?php
                    $APPLICATION->IncludeComponent("bitrix:menu", "sub",
                    array(
                        "MENU_CACHE_TYPE"    => "A",
                        "ROOT_MENU_TYPE"     => "left",
                        "MAX_LEVEL"          => "1"
                        ),
                    false);
              ?>
      <?endif;?>
