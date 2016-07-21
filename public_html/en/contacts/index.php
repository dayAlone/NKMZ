<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Contact us");
$APPLICATION->SetPageProperty("description", "Contact information of the head office of the company \"NKMZ Group\" - the manufacturer of packer anchor equipment in Neftekamsk.");
$APPLICATION->SetPageProperty('body_class', "content");
?><div class="text">
  <div class="row">
	<div class="col-sm-8">
	  <p class="s-margin-bottom">Neftekamsk Machinery Plant Trading House Ltd.<br>452683, Russian Federation, Republic of Bashkortostan, Neftekamsk, 19, Magistralnaya st.</p>
	  <p class="s-margin-bottom">Tel.: +7 (34783) 2-02-29, 2-09-74<br>Fax: +7 (34783) 2-02-29</p>
	  <p>E-mail: <a href="mailto:po@nkmz.ru">po@nkmz.ru</a></p>
	</div>
	<div class="col-sm-4 sm-right"><a href="#Feedback" data-toggle="modal" class="button">Get in touch</a></div>
  </div>
  <?
      $APPLICATION->IncludeComponent("bitrix:news.list", "contacts",
          array(
              "IBLOCK_ID"            => "17",
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