<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Sitemap');
$APPLICATION->SetPageProperty("description", "Sitemap LLC \"NKMZ Group\" - developer of equipment for drilling");
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
