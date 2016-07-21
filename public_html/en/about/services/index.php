<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Service centers');
$APPLICATION->SetPageProperty("description", "The company has opened service centers in 3 cities: Neftekamsk, Buzuluk, Nizhnevartovsk, where experienced staff carry out repair and support equipment.");
$APPLICATION->SetPageProperty('body_class', "content");
$APPLICATION->IncludeComponent("bitrix:news.list", "services",
  array(
      "IBLOCK_ID"            => "13",
      "NEWS_COUNT"           => "2000",
      "SORT_BY1"             => "SORT",
      "SORT_ORDER1"          => "ASC",
      "CACHE_TYPE"           => "A",
      "SET_TITLE"            => "N",
      "PROPERTY_CODE" => Array("SERVICES", "ADDRESS", "PHONE", "DIRECTOR", "COORDS"),
  ),
  false
);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
