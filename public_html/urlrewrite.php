<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/catalog/([\\w-_]+)/([\\w-_]+)/.*#",
		"RULE"      => "&SECTION_CODE=\$1&ELEMENT_CODE=\$2&\$3",
		"ID"        => "",
		"PATH"      => "/catalog/index.php",
	),
	array(
		"CONDITION" => "#^/catalog/([\\w-_]+)/.*#",
		"RULE"      => "&SECTION_CODE=\$1&\$2",
		"ID"        => "",
		"PATH"      => "/catalog/index.php",
	),
	array(
		"CONDITION" => "#^/press/([\\w-_]+)/([\\w-_]+)/.*#",
		"RULE"      => "&SECTION_CODE=\$1&ELEMENT_CODE=\$2&\$3",
		"ID"        => "",
		"PATH"      => "/press/index.php",
	),
	array(
		"CONDITION" => "#^/en/catalog/([\\w-_]+)/([\\w-_]+)/.*#",
		"RULE"      => "&SECTION_CODE=\$1&ELEMENT_CODE=\$2&\$3",
		"ID"        => "",
		"PATH"      => "/catalog/index.php",
	),
	array(
		"CONDITION" => "#^/en/catalog/([\\w-_]+)/.*#",
		"RULE"      => "&SECTION_CODE=\$1&\$2",
		"ID"        => "",
		"PATH"      => "/catalog/index.php",
	),
	array(
		"CONDITION" => "#^/en/press/([\\w-_]+)/([\\w-_]+)/.*#",
		"RULE"      => "&SECTION_CODE=\$1&ELEMENT_CODE=\$2&\$3",
		"ID"        => "",
		"PATH"      => "/press/index.php",
	),
	array(
		"CONDITION" => "#^/ajax/press/([\\w-_]+)/([\\w-_]+)/.*#",
		"RULE"      => "&SECTION_CODE=\$1&ELEMENT_CODE=\$2&\$3",
		"ID"        => "",
		"PATH"      => "/ajax/press/index.php",
	),
	array(
		"CONDITION" => "#^/press/([\\w-_]+)/.*#",
		"RULE"      => "&SECTION_CODE=\$1&\$2",
		"ID"        => "",
		"PATH"      => "/press/index.php",
	),
	array(
		"CONDITION" => "#^/about/vacancies/([\\w-_]+)/.*#",
		"RULE"      => "&ELEMENT_CODE=\$1&\$2",
		"ID"        => "",
		"PATH"      => "/about/vacancies/index.php",
	),
	array(
		"CONDITION" => "#^/ajax/about/vacancies/([\\w-_]+)/.*#",
		"RULE"      => "&ELEMENT_CODE=\$1&\$2",
		"ID"        => "",
		"PATH"      => "/ajax/about/vacancies/index.php",
	)
);

?>
