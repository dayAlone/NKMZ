<?
$gallery     = array();
$prop        = &$arResult["PROPERTIES"]['GALLERY'];
if(count($prop['VALUE']) > 0):
    $description = $prop['DESCRIPTION'];
    if(is_array($prop['VALUE'])):
        foreach ($prop['VALUE'] as $key => $value):
              $file  = CFile::GetByID($value)->Fetch();
              $small = CFile::ResizeImageGet($value, Array("width" => 312, "height" => 312), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, 100);
              $big   = CFile::ResizeImageGet($value, Array("width" => 1000, "height" => 1000), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, 100);
              $gallery[] = array('sort'=>$description[$key], 'src'=> $big['src'], 'small'=> $small['src'], 'w'=>$file['WIDTH'], "h"=>$file['HEIGHT']);
        endforeach;
        usort($gallery, "images_sort");
        $prop['VALUE'] = $gallery;
    endif;
endif;
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
