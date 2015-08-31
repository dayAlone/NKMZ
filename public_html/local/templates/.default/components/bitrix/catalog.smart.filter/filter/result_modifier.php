<?

function filter_sort($a, $b)
{
    return strcoll($a['VALUE'], $b['VALUE']);
}

if(LANGUAGE_ID == 'en'):
    foreach ($arResult['ITEMS'] as &$item):
        $arResult[$item['CODE']] = getHighloadElements(strtolower($item['USER_TYPE_SETTINGS']['TABLE_NAME']), 'UF_XML_ID', 'UF_NAME_EN');
        foreach ($item['VALUES'] as &$value) {
            $value['VALUE'] = $arResult[$item['CODE']][$value['URL_ID']];
        }
    endforeach;
endif;

foreach ($arResult['ITEMS'] as &$item):
    if($item['CODE'] == 'AREA')
        usort($item['VALUES'], "filter_sort");
endforeach;
?>
