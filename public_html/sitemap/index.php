<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Карта сайта');
$APPLICATION->SetPageProperty("description", "Карта сайта компании ООО «НКМЗ-Групп» - разработчика оборудования для бурения скважин");
$APPLICATION->SetPageProperty('body_class', "content");
$APPLICATION->IncludeComponent("bitrix:main.map", ".default", Array(
	"LEVEL"	=>	"3",
	"COL_NUM"	=>	"1",
	"SHOW_DESCRIPTION"	=>	"Y",
	"SET_TITLE"	=>	"Y",
	"CACHE_TIME"	=>	"36000000"
	)
);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
