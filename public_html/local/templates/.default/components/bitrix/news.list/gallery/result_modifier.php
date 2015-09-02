<?
$arResult['GALLERY'] = array();
$arResult['SHOW_ALL'] = true;
if(count($arResult['ITEMS']) > 1)
	$arResult['SHOW_ALL'] = false;

foreach ($arResult['ITEMS'] as $key => &$item) {
	$gallery = array();
	$prop    = &$item["PROPERTIES"]['GALLERY'];
	if(count($prop['VALUE']) > 0):
	    $description = $prop['DESCRIPTION'];
	    if(is_array($prop['VALUE'])):
	        foreach ($prop['VALUE'] as $key => $value):
				  $sort  = ($description[$key]?$description[$key]:0);
	              $small = CFile::ResizeImageGet($value, Array("width" => 400, "height" => 400), BX_RESIZE_IMAGE_PROPORTIONAL, true, false, false, 100);
	              $big   = CFile::ResizeImageGet($value, Array("width" => 1000, "height" => 1000), BX_RESIZE_IMAGE_PROPORTIONAL, true, false, false, 100);
	              $gallery[] = array('sort'=>$sort, 'src'=> $big['src'], 'small'=> $small['src'], 'w'=>$big['width'], "h"=>$big['height']);
	        endforeach;
	        usort($gallery, "images_sort");
	        $prop['VALUE'] = $gallery;
			if(count($gallery) > 0) $arResult['GALLERY'] = array_merge($arResult['GALLERY'], $gallery);
	    endif;
	endif;
}
function images_sort($a, $b)
{
	if($a['sort']=='' && $b['sort']>0)
		return 1;
	if($b['sort']=='' && $a['sort']>0)
		return -1;
	if($a['sort']=='' && $b['sort']=='')
		return ($a['value'] < $b['value']) ? -1 : 1;
	if ($a['sort'] == $b['sort'])
		return 0;
	return ($a['sort'] < $b['sort']) ? -1 : 1;
}

?>
