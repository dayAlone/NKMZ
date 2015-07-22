<?require($_SERVER['DOCUMENT_ROOT'].'/include/header.php');
$APPLICATION->SetPageProperty('body_class', "catalog");
?>
<div class="row">
  <div class="col-lg-4 col-lg-push-8">
      <?
          $APPLICATION->IncludeComponent("bitrix:catalog.smart.filter", "filter",
              array(
                  "IBLOCK_TYPE"         => "content_".LANGUAGE_ID,
                  "IBLOCK_ID"           => 3,
                  "CACHE_TYPE"          => "A",
                  "CACHE_TIME"          => "36000"
              )
          );
    ?>
  </div>
  <div class="col-lg-8 col-lg-pull-4">
      <?
        if(!isset($_REQUEST['ELEMENT_CODE']) && !isset($_REQUEST['SECTION_CODE']) && !isset($_REQUEST['action']) && !@defined("ERROR_404")):
        	$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "sections", array(
			    "IBLOCK_TYPE"  => "content_".LANGUAGE_ID,
			    "IBLOCK_ID"    => "3",
			    "TOP_DEPTH"    => "1",
			    "CACHE_TYPE"   => "A",
			    "CACHE_TIME"   => "36000"
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
