<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Certificates');
$APPLICATION->SetPageProperty('body_class', "content");
$APPLICATION->IncludeComponent("bitrix:news.list", "licenses",
  array(
      "IBLOCK_ID"            => "16",
      "NEWS_COUNT"           => "1000000",
      "SORT_BY1"             => "SORT",
      "SORT_ORDER1"          => "ASC",
      "CACHE_TYPE"           => "A",
      "SET_TITLE"            => "N",
      "PROPERTY_CODE" => Array("GALLERY"),
  ),
  false
);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
