<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->IncludeComponent("bitrix:news.detail","news",Array(
	"IBLOCK_ID"     => (LANGUAGE_ID=='ru'?9:14),
	"ELEMENT_CODE"  => $_REQUEST['ELEMENT_CODE'],
	"CHECK_DATES"   => "N",
	"IBLOCK_TYPE"   => "content_".LANGUAGE_ID,
	"SET_TITLE"     => "N",
	"PROPERTY_CODE" => Array("GALLERY"),
	"CACHE_TYPE"    => "A",
	"CACHE_TIME"    => "36000",
	"TEXT"          =>  (LANGUAGE_ID=='ru'?"Вакансия":"Vacancy"),
	"CLOSE"         =>  (LANGUAGE_ID=='ru'?"Закрыть описание":"Close"),
	"AFTER"         => '<a href="#Career" data-toggle="modal" class="button button--blue">Откликнуться на вакансию</a>'
));
?>
