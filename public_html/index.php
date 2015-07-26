<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Главная');
$APPLICATION->SetPageProperty('body_class', "index");
?>
<div class="row">
	<div class="col-lg-6 col-md-4">
		<?
			$APPLICATION->IncludeComponent("bitrix:news.list", "slider",
				array(
					"IBLOCK_ID"            => "1",
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
					"IBLOCK_ID"            => "2",
					"NEWS_COUNT"           => "1",
					"SORT_BY1"             => "ACTIVE_FROM",
					"SORT_ORDER1"          => "DESC",
					"CACHE_TYPE"           => "A",
					'PROPERTY_CODE'        => array(''),
					"SET_TITLE"            => "N",
					"SHOW_MORE"            => "Y",
					"DISPLAY_BOTTOM_PAGER" => "N",
				),
				false
			);
		?>
	</div>
	<div class="col-lg-6 col-md-8">
		<?
        	$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "sections", array(
			    "IBLOCK_TYPE"  => "content_".LANGUAGE_ID,
			    "IBLOCK_ID"    => "3",
			    "TOP_DEPTH"    => "1",
			    "CACHE_TYPE"   => "A",
			    "CACHE_TIME"   => "36000",
				"SECTION_USER_FIELDS" => array('UF_SVG')
			),
			false
			);
		?>
		<?
			$APPLICATION->IncludeComponent("bitrix:catalog.smart.filter", "filter",
				array(
					"IBLOCK_TYPE"         => "content_".LANGUAGE_ID,
					"IBLOCK_ID"           => 3,
					"CACHE_TYPE"          => "A",
					"CACHE_TIME"          => "36000"
				)
			);
		?>
	</div>
	<?
		$APPLICATION->IncludeComponent("bitrix:news.list", "news-index",
			array(
				"IBLOCK_ID"            => "2",
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
</div>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
