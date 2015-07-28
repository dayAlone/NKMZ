<!DOCTYPE html><html lang='ru'>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <?
  $APPLICATION->SetAdditionalCSS("/layout/css/frontend.css", true);
  $APPLICATION->AddHeadScript('/layout/js/frontend.js');
  global $CITY;
  ?>
  <title><?php
    $rsSites = CSite::GetByID(SITE_ID);
    $arSite  = $rsSites->Fetch();
    if($APPLICATION->GetCurDir() != '/' && $APPLICATION->GetCurDir() != "/eng/") {
      $APPLICATION->ShowTitle();

      echo ' | ' . $arSite['NAME'];
    }
    else echo $arSite['NAME'];
    ?></title>
  <?
    $APPLICATION->ShowHead();
    $APPLICATION->ShowViewContent('header');
  ?>
</head>
<body class="<?=$APPLICATION->AddBufferContent("body_class");?> <?=SITE_ID?>">
<div class="wrap">
  <div id="panel"><?$APPLICATION->ShowPanel();?></div>
  <div class="toolbar">
    <div class="container">
      <div class="toolbar__logo"><a href="/" class="logo"><?=svg('logo')?></a></div>
      <div class="toolbar__api right">
		  <span class="api"><?=svg('logo-api')?>
	          <span class="api__text">
	            American Petroleum Institute Certification
			</span>
		  </span>
	 </div>
	  <?php
            $APPLICATION->IncludeComponent("bitrix:menu", "toolbar",
            array(
                "MENU_CACHE_TYPE"    => "A",
                "ROOT_MENU_TYPE"     => "top",
                "MAX_LEVEL"          => "1"
                ),
            false);
      ?>
      <div class="toolbar__tools right">
		  <a href="#Nav" data-toggle="modal" class="nav-trigger"><span>Меню</span><?=svg('nav')?></a>
		  <div class="visible-md visible-lg">
			  <span class="lang">
				  <a href="#" class="lang__trigger <?=(LANGUAGE_ID=='ru'?"lang__trigger--active":"")?>"><span>RU</span></a>
				  <a href="#" class="lang__trigger <?=(LANGUAGE_ID=='en'?"lang__trigger--active":"")?>"><span>EN</span></a>
			  </span>
			  <a href="#" class="toolbar__link"><?=svg('search')?></a></div>
      </div>
      <div class="toolbar__contacts right">
		  <span class="toolbar__block">
			  <a href="<?=preg_replace("/[^0-9+]/", "", COption::GetOptionString("grain.customsettings", 'phone_'.LANGUAGE_ID))?>" class="toolbar__link"><?=COption::GetOptionString("grain.customsettings", 'phone_'.LANGUAGE_ID)?></a>
			  <a href="mailto:<?=COption::GetOptionString("grain.customsettings", 'email_'.LANGUAGE_ID)?>" class="toolbar__link"><?=COption::GetOptionString("grain.customsettings", 'email_'.LANGUAGE_ID)?></a>
			  <a href="#Feedback" data-toggle="modal" class="toolbar__link">Обратная связь</a>
		  </span>
	  </div>
    </div>
  </div>
  <div class="page">
    <div class="container">
