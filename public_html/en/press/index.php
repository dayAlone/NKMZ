<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Press center');
$APPLICATION->SetPageProperty('body_class', "content");
$APPLICATION->SetPageProperty('section', array('IBLOCK'=>18, 'CODE'=>'news-list'));
require($_SERVER['DOCUMENT_ROOT'].'/include/section.php');
$APPLICATION->IncludeComponent("bitrix:news.list", "news",
    array(
        "IBLOCK_ID"            => "18",
        "NEWS_COUNT"           => "1",
        "SORT_BY1"             => "ACTIVE_FROM",
        "SORT_ORDER1"          => "DESC",
        "CACHE_TYPE"           => "A",
        "SET_TITLE"            => "N",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "SHOW_YEARS"           => "Y",
        "PARENT_SECTION_CODE"  => (isset($_GLOBALS['currentSection'])?$_GLOBALS['currentSection']:$_REQUEST['SECTION_CODE'])
    ),
    false
);
if(isset($_REQUEST['SECTION_CODE']) && isset($_REQUEST['ELEMENT_CODE'])):?>
<script type="text/javascript">
$(function(){
    loadElement("/press/<?=$_REQUEST['SECTION_CODE']?>/<?=$_REQUEST['ELEMENT_CODE']?>/");
});
</script>
<?endif;
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
