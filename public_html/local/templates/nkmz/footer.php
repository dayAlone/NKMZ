		</div>
	</div>
	<div class="col-md-3 col-lg-6">
		<div style="<?=(strlen($_GLOBALS['BG_IMAGE']['src'])>0?'background-image: url('.$_GLOBALS['BG_IMAGE']['src'].');':'')?> <?=(strlen($_GLOBALS['BG_IMAGE']['position'])>0?'background-position: '.$_GLOBALS['BG_IMAGE']['position'].';':'')?>" class="page__side">
			<?$APPLICATION->ShowViewContent('sidebar');?>
		</div>
	</div>
</div>
<div class="page__modal page__modal--text">
  <div class="modal__content"></div>
</div>
<?require($_SERVER['DOCUMENT_ROOT'].'/include/footer.php');?>
