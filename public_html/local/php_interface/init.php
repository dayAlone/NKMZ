<?
ini_set('xdebug.var_display_max_depth', 5);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

function svg($value='')
{
	$path = $_SERVER["DOCUMENT_ROOT"]."/layout/images/svg/".$value.".svg";
	return file_get_contents($path);
}
function body_class()
{
	global $APPLICATION;
	if($APPLICATION->GetPageProperty('body_class')) {
		return $APPLICATION->GetPageProperty('body_class');
	}
}
function page_title()
{
	global $APPLICATION;
	if($APPLICATION->GetPageProperty('page_title')) {
		return $APPLICATION->GetPageProperty('page_title');
	}
}
if(!strstr($_SERVER['SCRIPT_NAME'], 'bitrix/admin')):
	# Background image
	$obCache       = new CPHPCache();
	$cacheLifetime = 86400;
	$cacheID       = 'BG_'.md5($APPLICATION->GetCurDir());
	$cachePath     = '/';
	if( $obCache->InitCache($cacheLifetime, $cacheID, $cachePath) ):
	   $vars = $obCache->GetVars();
	   $_GLOBALS['BG_IMAGE'] = $vars['BG_IMAGE'];
	elseif( $obCache->StartDataCache() ):

		CModule::IncludeModule("iblock");

		$arSelect = Array("ID", "PREVIEW_PICTURE", "DETAIL_PICTURE", "PROPERTY_PAGE", "PROPERTY_POSITION");
		$path     = preg_split('/\//', $APPLICATION->GetCurDir(), false, PREG_SPLIT_NO_EMPTY);
		$urls     = array();
		for ($i=0; $i < count($path); $i++) $urls[] = (isset($urls[$i-1])?$urls[$i-1]:"/").$path[$i].'/';
		$arFilter = Array("IBLOCK_ID"=>4, "PROPERTY_PAGE" => $urls);
		$res      = CIBlockElement::GetList(Array("PROPERTY_PAGE"=>"ASC"), $arFilter, false, false, $arSelect);

		global $CACHE_MANAGER;
		$CACHE_MANAGER->StartTagCache($cachePath);
			while($ob = $res->Fetch()):
				if(strlen($APPLICATION->GetCurDir())>=strlen($ob["PROPERTY_PAGE_VALUE"])):
					$data = array('src' => CFile::GetPath($ob['PREVIEW_PICTURE']), 'position'=>$ob['PROPERTY_POSITION']);
					$_GLOBALS['BG_IMAGE'] = $data;
				endif;
			endwhile;
		$CACHE_MANAGER->RegisterTag($cacheID);
		$CACHE_MANAGER->EndTagCache();
		$obCache->EndDataCache(array('BG_IMAGE' => $data));
	endif;
	AddEventHandler("iblock", "OnBeforeIBlockElementAdd", "OnBeforeIBlockElementAddHandler");
	AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", "OnBeforeIBlockElementAddHandler");
	function OnBeforeIBlockElementAddHandler(&$arFields)
	{
		if($arFields['IBLOCK_ID']==4):

			global $CACHE_MANAGER;

			$db_props = CIBlockElement::GetProperty($arFields['IBLOCK_ID'], $arFields['ID'], array("sort" => "asc"), Array("CODE"=>"PAGE"));
			while($ar_props = $db_props->Fetch())
				$CACHE_MANAGER->ClearByTag('/BG_'.md5($ar_props['VALUE']));
			foreach ($arFields['PROPERTY_VALUES'] as $values)
				foreach ($values as $value)
					if(strlen($value['VALUE'])>0)
						$CACHE_MANAGER->ClearByTag('/BG_'.md5($value['VALUE']));
		endif;
	}
endif;

use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;
function getHighloadBlocks()
{
	$obCache   = new CPHPCache();
	$cacheLife = 86400;
	$cacheID   = 'getHighloadBlocks';
	$cachePath = '/'.$cacheID;

	if( $obCache->InitCache($cacheLife, $cacheID, $cachePath) ):

		$vars = $obCache->GetVars();
		$data = $vars['data'];

	elseif( $obCache->StartDataCache() ):
		CModule::IncludeModule("highloadblock");
		$data    = array();
		$dbHblock = HL\HighloadBlockTable::getList();
	    while ($ib = $dbHblock->Fetch())
	    	$data[$ib['TABLE_NAME']] = (int)$ib['ID'];

		$obCache->EndDataCache(array('data' => $data));
	endif;
	return $data;
}

function getHighloadElements($name, $key, $value)
{
	$iblocks   = getHighloadBlocks();
	$id        = $iblocks[$name];
	$obCache   = new CPHPCache();
	$cacheLife = 86400;
	$cacheID   = 'getHighloadElements_site_'.$key.$value.$id;
	$cachePath = '/'.$cacheID;
	if( $obCache->InitCache($cacheLife, $cacheID, $cachePath) ):

		$vars = $obCache->GetVars();
		$data = $vars['data'];

	elseif( $obCache->StartDataCache() ):
		CModule::IncludeModule("highloadblock");
		$hlblock = HL\HighloadBlockTable::getById($id)->fetch();
		$entity  = HL\HighloadBlockTable::compileEntity($hlblock);
		$class   = $entity->getDataClass();

		$rsData = $class::getList(array(
			"select" => array("*"),
			"order"  => array("ID" => "ASC")
		));

		$data = array();

		while($arData = $rsData->Fetch())
			$data[$arData[$key]] = $arData[$value];

		$obCache->EndDataCache(array('data' => $data));

	endif;
	return $data;
}

?>
