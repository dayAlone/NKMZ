</div>
<div class="scroll-fix"></div>
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-4 col-md-3 col-lg-2">© <?=date("Y")?> <?=GetMessage('NAME')?></div>
      <div class="col-sm-4 col-lg-2"><?=GetMessage('ADDRESS')?></div>
      <div class="col-sm-4 col-lg-2 col-md-2 sm-right md-left">
		  	<a href="tel:<?=preg_replace("/[^0-9+]/", "", GetMessage('PHONE'))?>"><?=GetMessage('PHONE')?></a>
		  	<br class="hidden-xs">
			<a href="mailto:<?=GetMessage('EMAIL')?>"><?=GetMessage('EMAIL')?></a>
	  </div>
      <div class="col-sm-3 col-lg-1 md-right lg-left hidden-sm"><a href="#"><?=GetMessage('SITEMAP')?></a></div>
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
</div></body>
</html>
