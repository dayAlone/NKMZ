<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Продукция');
global $arCatalogFilter;
if(isset($_REQUEST['ELEMENT_CODE'])):
	$APPLICATION->IncludeComponent("bitrix:news.detail","catalog",Array(
		"IBLOCK_ID"     => 3,
		"ELEMENT_CODE"  => $_REQUEST['ELEMENT_CODE'],
		"CHECK_DATES"   => "N",
		"IBLOCK_TYPE"   => "content_".LANGUAGE_ID,
		"SET_TITLE"     => "Y",
		"FIELD_CODE"    => array("PREVIEW_PICTURE"),
		"PROPERTY_CODE" => Array("TABLE"),
		"CACHE_TYPE"    => "A",
		"CACHE_TIME"    => "36000"
	));
elseif(isset($_REQUEST['SECTION_CODE']) || isset($_REQUEST['set_filter'])):
	$APPLICATION->IncludeComponent("bitrix:news.list", "catalog",
	  array(
	      "IBLOCK_ID"     => "3",
	      "NEWS_COUNT"    => "20",
	      "SORT_BY1"      => "SORT",
	      "SORT_ORDER1"   => "ASC",
	      "CACHE_TYPE"    => "A",
	      "SET_TITLE"     => "N",
		  "FILTER_NAME"   => "arCatalogFilter",
		  "DISPLAY_BOTTOM_PAGER" => "Y",
		  "PARENT_SECTION_CODE"  => $_REQUEST['SECTION_CODE']
	  ),
	  false
	);
endif;

require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
