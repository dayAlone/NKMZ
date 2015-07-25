<?require($_SERVER['DOCUMENT_ROOT'].'/include/header.php');
?>
<div class="row">
    <div class="col-md-9 col-lg-6">
        <div class="page__content" style="<?=(strlen($_COOKIE['height'])>0?"min-height: ".$_COOKIE['height']."px":"")?>">
            <div class="page__title">
                <div class="row">
                    <div class="col-sm-8">
                        <h1><?=$APPLICATION->ShowTitle();?></h1>
                    </div>
                    <div class="col-sm-4 sm-right">
                        <?$APPLICATION->ShowViewContent('title');?>
                    </div>
                </div>
            </div>
            <?php
                  $APPLICATION->IncludeComponent("bitrix:menu", "sub",
                  array(
                      "MENU_CACHE_TYPE"    => "A",
                      "ROOT_MENU_TYPE"     => "left",
                      "MAX_LEVEL"          => "1"
                      ),
                  false);
            ?>
