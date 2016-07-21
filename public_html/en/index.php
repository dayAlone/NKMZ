<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Index');
$APPLICATION->SetPageProperty('body_class', "index");
?>
<div class="row">
	<div class="col-lg-6 col-md-4">
		<?
			$APPLICATION->IncludeComponent("bitrix:news.list", "slider",
				array(
					"IBLOCK_ID"            => "19",
					"NEWS_COUNT"           => "1000000",
					"SORT_BY1"             => "SORT",
					"SORT_ORDER1"          => "ASC",
					"CACHE_TYPE"           => "A",
					'PROPERTY_CODE'        => array('LINK'),
					"SET_TITLE"            => "N"
				),
				false
			);
		?>
		<?
			$APPLICATION->IncludeComponent("bitrix:news.list", "news",
				array(
					"IBLOCK_ID"            => "18",
					"NEWS_COUNT"           => "1",
					"SORT_BY1"             => "ACTIVE_FROM",
					"SORT_ORDER1"          => "DESC",
					"CACHE_TYPE"           => "A",
					'PROPERTY_CODE'        => array(''),
					"SET_TITLE"            => "N",
					"SHOW_MORE"            => "Y",
					"DISPLAY_BOTTOM_PAGER" => "N",
					"CLASS"                => "visible-md visible-lg news-list--slider"
				),
				false
			);
		?>
	</div>
	<div class="col-lg-6 col-md-8">
		<?
        	$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "sections", array(
			    "IBLOCK_TYPE"  => "content_en",
			    "IBLOCK_ID"    => "12",
			    "TOP_DEPTH"    => "1",
			    "CACHE_TYPE"   => "A",
			    "CACHE_TIME"   => "36000",
				"SECTION_USER_FIELDS" => array('UF_SVG')
			),
			false
			);
		?>
		<?
			$APPLICATION->IncludeComponent(
	"bitrix:catalog.smart.filter", 
	"filter", 
	array(
		"IBLOCK_TYPE" => "content_ru",
		"IBLOCK_ID" => "3",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000",
		"SECTION_ID" => "0",
		"FILTER_NAME" => "arCatalogFilter",
		"COMPONENT_TEMPLATE" => "filter",
		"SECTION_CODE" => "",
		"SEF_MODE" => "N",
		"CACHE_GROUPS" => "Y",
		"SAVE_IN_SESSION" => "N",
		"INSTANT_RELOAD" => "N",
		"PAGER_PARAMS_NAME" => "arrPager",
		"XML_EXPORT" => "N",
		"SECTION_TITLE" => "-",
		"SECTION_DESCRIPTION" => "-"
	),
	false
);
		?>
	</div>
</div>

<?
	$APPLICATION->IncludeComponent("bitrix:news.list", "news-index",
		array(
			"IBLOCK_ID"            => "18",
			"NEWS_COUNT"           => "2",
			"SORT_BY1"             => "ACTIVE_FROM",
			"SORT_ORDER1"          => "DESC",
			"CACHE_TYPE"           => "A",
			'PROPERTY_CODE'        => array(''),
			"SET_TITLE"            => "N"
		),
		false
	);
?>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
