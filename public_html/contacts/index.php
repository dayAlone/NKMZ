<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Контакты');
$APPLICATION->SetPageProperty('body_class', "content");
?>
<div class="text">
  <div class="row">
	<div class="col-sm-8">
	  <p class="s-margin-bottom">452683, РФ, Республика Башкортостан, <br>г. Нефтекамск, ул. Магистральная, д. 19</p>
	  <p class="s-margin-bottom">Тел.: +7 (34783) 2-11-99<br>Факс: +7 (34783) 2-04-82</p>
	  <p>E-mail: <a href="mailto:po@nkmz.ru">po@nkmz.ru</a></p>
	</div>
	<div class="col-sm-4 sm-right"><a href="#Feedback" data-toggle="modal" class="button">Напишите нам</a></div>
  </div>
  <?
      $APPLICATION->IncludeComponent("bitrix:news.list", "contacts",
          array(
              "IBLOCK_ID"            => "5",
              "NEWS_COUNT"           => "1000000",
              "SORT_BY1"             => "SORT",
              "SORT_ORDER1"          => "ASC",
              "CACHE_TYPE"           => "A",
              'PROPERTY_CODE'        => array('NAME', 'EMAIL', 'PHONE'),
              "SET_TITLE"            => "N"
          ),
          false
      );
  ?>
</div>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
