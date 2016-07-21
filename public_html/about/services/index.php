<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Сервисные центры');
$APPLICATION->SetPageProperty("description", "Компания открыла 3 сервисных центра в городах: Нефтекамск, Бузулук, Нижневартовск, в которых опытные сотрудники осуществляют ремонт и поддержку оборудования.");
$APPLICATION->SetPageProperty('body_class', "content");
$APPLICATION->IncludeComponent("bitrix:news.list", "services",
  array(
      "IBLOCK_ID"            => "10",
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
