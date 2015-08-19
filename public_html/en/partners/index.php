<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Partners');
$APPLICATION->SetPageProperty('body_class', "content");
$APPLICATION->IncludeComponent("bitrix:news.list", "partners",
  array(
      "IBLOCK_ID"            => "6",
      "NEWS_COUNT"           => "1000000",
      "SORT_BY1"             => "SORT",
      "SORT_ORDER1"          => "ASC",
      "CACHE_TYPE"           => "A",
      "SET_TITLE"            => "N"
  ),
  false
);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
