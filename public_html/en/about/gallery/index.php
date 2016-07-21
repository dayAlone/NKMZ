<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Photogallery');
$APPLICATION->SetPageProperty("description", "We use advanced technology and advanced equipment, our employees have the highest qualifications");
$APPLICATION->SetPageProperty('body_class', "content");
$APPLICATION->IncludeComponent("bitrix:news.list", "gallery",
  array(
      "IBLOCK_ID"            => "11",
      "NEWS_COUNT"           => "2000",
      "SORT_BY1"             => "SORT",
      "SORT_ORDER1"          => "ASC",
      "CACHE_TYPE"           => "A",
      "SET_TITLE"            => "N",
      "PROPERTY_CODE"        => Array("GALLERY")
  ),
  false
);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
