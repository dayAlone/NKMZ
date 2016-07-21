<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Лицензии');
$APPLICATION->SetPageProperty("description", "Наша продукция проходит строгий контроль качества и соответствует международному стандарту ISO 9001:2008");
$APPLICATION->SetPageProperty('body_class', "content");
$APPLICATION->IncludeComponent("bitrix:news.list", "licenses",
  array(
      "IBLOCK_ID"            => "7",
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
