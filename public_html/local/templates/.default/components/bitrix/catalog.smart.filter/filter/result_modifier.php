<?
function filter_sort($a, $b)
{
    return strcoll($a['VALUE'], $b['VALUE']);
}
foreach ($arResult['ITEMS'] as &$item):

    usort($item['VALUES'], "filter_sort");
endforeach;
?>
