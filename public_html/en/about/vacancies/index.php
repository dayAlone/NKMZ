<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Вакансии');
$APPLICATION->SetPageProperty('body_class', "content");
$APPLICATION->IncludeComponent("bitrix:news.list", "vacancies",
  array(
      "IBLOCK_ID"            => "14",
      "NEWS_COUNT"           => "1000000",
      "SORT_BY1"             => "SORT",
      "SORT_ORDER1"          => "ASC",
      "CACHE_TYPE"           => "A",
      "SET_TITLE"            => "N",
      "PROPERTY_CODE" => Array("GALLERY"),
  ),
  false
);
if(isset($_REQUEST['ELEMENT_CODE'])):?>
<script type="text/javascript">
$(function(){
    loadElement("/about/vacancies/<?=$_REQUEST['ELEMENT_CODE']?>/");
});
</script>
<?endif;
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
