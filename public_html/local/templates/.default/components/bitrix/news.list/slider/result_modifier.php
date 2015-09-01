<?
foreach ($arResult['ITEMS'] as $key => &$item) {
    $small = CFile::ResizeImageGet($item['PREVIEW_PICTURE']['ID'], Array("width" => 100, "height" => 100), BX_RESIZE_IMAGE_PROPORTIONAL, true, false, false, 100);
    $item['PREVIEW_PICTURE']['SMALL'] = $small['src'];
}
?>
