		  	<?if(isset($_REQUEST['ELEMENT_CODE']) || isset($_REQUEST['SECTION_CODE']) || isset($_REQUEST['set_filter']) || @defined("ERROR_404")):?></div><?endif;?>
		  </div>
		  <div class="col-lg-4">
			<?$APPLICATION->ShowViewContent('filter');?>
		  </div>
	</div>
</div>
<div class="page__modal page__modal--text">
  <div class="modal__content">
  	<?$APPLICATION->ShowViewContent('modal');?>
  </div>
</div>
<?require($_SERVER['DOCUMENT_ROOT'].'/include/footer.php');?>
