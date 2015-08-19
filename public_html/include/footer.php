		</div>
	</div>
</div>
<div class="scroll-fix"></div>
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-4 col-md-3 col-lg-2">© <?=date("Y")?> <?=COption::GetOptionString("grain.customsettings", 'name_'.LANGUAGE_ID)?></div>
      <div class="col-sm-4 col-lg-2"><?=COption::GetOptionString("grain.customsettings", 'address_'.LANGUAGE_ID)?></div>
      <div class="col-sm-4 col-lg-2 col-md-2 sm-right md-left">
		  	<a href="tel:<?=preg_replace("/[^0-9+]/", "", COption::GetOptionString("grain.customsettings", 'phone_'.LANGUAGE_ID))?>"><?=COption::GetOptionString("grain.customsettings", 'phone_'.LANGUAGE_ID)?></a>
		  	<br class="hidden-xs">
			<a href="mailto:<?=COption::GetOptionString("grain.customsettings", 'email_'.LANGUAGE_ID)?>"><?=COption::GetOptionString("grain.customsettings", 'email_'.LANGUAGE_ID)?></a>
	  </div>
      <div class="col-sm-3 col-lg-1 md-right lg-left hidden-sm"><a href="<?=(LANGUAGE_ID=='ru'?"":"/en")?>/sitemap/"><?=(LANGUAGE_ID=='ru'?"Карта сайта":"Sitemap")?></a></div>
    </div>
  </div>
</footer>
<div tabindex="-1" role="dialog" aria-hidden="true" class="pswp">
  <div class="pswp__bg"></div>
  <div class="pswp__scroll-wrap">
    <div class="pswp__container">
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
    </div>
    <div class="pswp__ui pswp__ui--hidden">
      <div class="pswp__top-bar">
        <div class="pswp__counter"></div>
        <button title="Close (Esc)" class="pswp__button pswp__button--close"></button>
        <button title="Share" class="pswp__button pswp__button--share"></button>
        <button title="Toggle fullscreen" class="pswp__button pswp__button--fs"></button>
        <button title="Zoom in/out" class="pswp__button pswp__button--zoom"></button>
        <div class="pswp__preloader">
          <div class="pswp__preloader__icn">
            <div class="pswp__preloader__cut">
              <div class="pswp__preloader__donut"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
        <div class="pswp__share-tooltip"></div>
      </div>
      <button title="Previous (arrow left)" class="pswp__button pswp__button--arrow--left"></button>
      <button title="Next (arrow right)" class="pswp__button pswp__button--arrow--right"></button>
      <div class="pswp__caption">
        <div class="pswp__caption__center"></div>
      </div>
    </div>
  </div>
</div>
<div id="Nav" tabindex="-1" role="dialog" aria-hidden="true" data-parsley-validate class="modal fade">
  <div class="modal-dialog modal-lg">
	  <div class="m-margin-top xl-margin-bottom row">
		  <div class="col-xs-6">
			  <span class="lang">
  				<a href="/" class="lang__trigger <?=(LANGUAGE_ID=='ru'?"lang__trigger--active":"")?>"><span>RU</span></a>
  				<a href="/en/" class="lang__trigger <?=(LANGUAGE_ID=='en'?"lang__trigger--active":"")?>"><span>EN</span></a>
  			  </span>
		  </div>
		  <div class="col-xs-6 right">
		  	<a data-dismiss="modal" href="#" class="close"><?=(LANGUAGE_ID=='ru'?"Закрыть":"Close")?></a>
		  </div>
	  </div>
	  <?
		  $APPLICATION->IncludeComponent("bitrix:main.map", ".default", Array(
			  "LEVEL"	=>	"3",
			  "COL_NUM"	=>	"1",
			  "SHOW_DESCRIPTION"	=>	"Y",
			  "SET_TITLE"	=>	"N",
			  "CACHE_TIME"	=>	"36000000"
			  )
		  );
	  ?>
  </div>
</div>

<?$APPLICATION->ShowViewContent('footer');?>
<? require_once($_SERVER['DOCUMENT_ROOT'] . "/include/feedback-".LANGUAGE_ID.".php"); ?>
<? require_once($_SERVER['DOCUMENT_ROOT'] . "/include/career-".LANGUAGE_ID.".php"); ?>
</body>
</html>
