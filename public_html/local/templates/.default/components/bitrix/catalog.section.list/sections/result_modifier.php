<?
foreach($arResult['SECTIONS'] as &$section):
	if($section['UF_SVG']):
		$section['UF_SVG'] = file_get_contents($_SERVER['DOCUMENT_ROOT'].CFile::GetPath($section['UF_SVG']));
	endif;
endforeach;
?>
