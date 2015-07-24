<?if($arParams['SHOW_YEARS']=="Y"):
	$this->SetViewTarget('title');
		$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "years", array(
		    "IBLOCK_TYPE"  => "content",
		    "IBLOCK_ID"    => $arParams["IBLOCK_ID"],
		    "TOP_DEPTH"    => "2",
		    "CACHE_TYPE"   => "A",
		    "CACHE_TIME"   => "36000",
		    "CACHE_NOTES"  => $arParams["PARENT_SECTION"],
		),
		false
		);
	$this->EndViewTarget();
endif;?>
