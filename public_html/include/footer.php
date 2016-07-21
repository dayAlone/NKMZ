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
<!-- Yandex.Metrika counter --><script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter33656309 = new Ya.Metrika({ id:33656309, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="https://mc.yandex.ru/watch/33656309" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->
<!-- begin of Top100 code -->
<div id="Rambler-counter" style="display:none;">
<!-- Внимание! В этом div'е не нельзя размещать пользовательский контент: он будет затерт! -->
<noscript>
<a href="http://top100.rambler.ru/navi/4425823/">
  <img src="http://counter.rambler.ru/top100.cnt?4425823" alt="Rambler's Top100" border="0" />
</a>
</noscript>
</div>
<!-- Код скрипта должен быть размещен строго ниже контейнера для логотипа (div c id='Rambler-counter') -->
<script type="text/javascript">
var _top100q = _top100q || [];
_top100q.push(['setAccount', '4425823']);
_top100q.push(['trackPageviewByLogo', document.getElementById('Rambler-counter')]);
(function(){
  var pa = document.createElement("script"); 
  pa.type = "text/javascript"; 
  pa.async = true;
  pa.src = ("https:" == document.location.protocol ? "https:" : "http:") + "//st.top100.ru/top100/top100.js";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(pa, s);
})();
</script>
<!-- end of Top100 code -->
<!-- Rating@Mail.ru counter -->
<script type="text/javascript">
var _tmr = window._tmr || (window._tmr = []);
_tmr.push({id: "2780945", type: "pageView", start: (new Date()).getTime()});
(function (d, w, id) {
  if (d.getElementById(id)) return;
  var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true; ts.id = id;
  ts.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//top-fwz1.mail.ru/js/code.js";
  var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
  if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
})(document, window, "topmailru-code");
</script><noscript><div style="position:absolute;left:-10000px;">
<img src="//top-fwz1.mail.ru/counter?id=2780945;js=na" style="border:0;" height="1" width="1" alt="Рейтинг@Mail.ru" />
</div></noscript>
<!-- //Rating@Mail.ru counter -->
<!-- Google Analytics --><script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-47602606-2', 'auto');
  ga('send', 'pageview');
</script><!-- Google Analytics -->
</body>
</html>