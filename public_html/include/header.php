<!DOCTYPE html>
<html lang='<?=LANGUAGE_ID?>'>
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
    if($APPLICATION->GetCurDir() != '/' && $APPLICATION->GetCurDir() != "/en/") {
      $APPLICATION->ShowTitle();

      echo ' | ' . $arSite['NAME'];
    }
    elseif ($APPLICATION->GetCurDir() == '/') {
      echo 'Производство пакерного оборудования, оборудования для добычи нефти и газа | ' . $arSite['NAME'];
    }
    elseif ($APPLICATION->GetCurDir() == '/en/') {
      echo 'Production of packer anchor equipment, equipment for the oil and gas | ' . $arSite['NAME'];
    }
    else echo $arSite['NAME'];
    ?></title>
<?
if ($APPLICATION->GetCurDir() == '/') {?>
<meta name="description" content="Производство оборудования для работ на газовых скважинах, продажа пакерно-якорного оборудования, клапанов и скважинной оснастки" />
<?}?>
<?
if ($APPLICATION->GetCurDir() == '/en/') {?>
<meta name="description" content="Production of equipment for work at gas wells, sale packer and anchor equipment, valves, downhole tooling" />
<?}?>
  <?
    $APPLICATION->ShowHead();
    $APPLICATION->ShowViewContent('header');
  ?>
</head>
<body class="<?=$APPLICATION->AddBufferContent("body_class");?> <?=SITE_ID?> " data-site-name="<?=$arSite['NAME']?>">
<div class="wrap">
  <div id="panel"><?$APPLICATION->ShowPanel();?></div>
  <div class="toolbar">
    <div class="container">
      <div class="toolbar__logo"><a href="<?=SITE_DIR?>" class="logo"><?=svg('logo_'.LANGUAGE_ID)?></a></div>
      <div class="toolbar__api right">
		  <span class="api"><?=svg('logo-api')?>
	          <span class="api__text">
				  American Petroleum Institute Certification №11D1-0068
			</span>
		  </span>
	 </div>
     <div class="toolbar__veritas">
         <?=svg('veritas')?>
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
				  <a href="/" class="lang__trigger <?=(LANGUAGE_ID=='ru'?"lang__trigger--active":"")?>"><span>RU</span></a>
				  <a href="/en/" class="lang__trigger <?=(LANGUAGE_ID=='en'?"lang__trigger--active":"")?>"><span>EN</span></a>
			  </span>
              <form action="<?=SITE_DIR?>search/" class="search">
                  <input type="text" name="q">
                  <button type="submit"><?=svg('search')?></button>
              </form>
			  <a href="#" class="toolbar__link search-trigger"><?=svg('search')?></a>
          </div>
      </div>

      <div class="toolbar__contacts right">
		  <span class="toolbar__block">
			  <a href="tel:<?=preg_replace("/[^0-9+]/", "", COption::GetOptionString("grain.customsettings", 'phone_'.LANGUAGE_ID))?>" class="toolbar__link"><?=COption::GetOptionString("grain.customsettings", 'phone_'.LANGUAGE_ID)?></a>
			  <a href="mailto:<?=COption::GetOptionString("grain.customsettings", 'email_'.LANGUAGE_ID)?>" class="toolbar__link"><?=COption::GetOptionString("grain.customsettings", 'email_'.LANGUAGE_ID)?></a>
		  </span>
	  </div>
      <div class="toolbar__feedback">
        <a href="#Feedback" data-toggle="modal" class="toolbar__link"><?=(LANGUAGE_ID=='ru'?'Обратная связь':'Feedback')?></a>
      </div>

    </div>
  </div>
  <div class="page">
    <div class="container">
