<?if(count($arResult['ITEMS'])>0):?>
<form action="/catalog/" method="GET" class="filter">
    <input type="hidden" name="set_filter" value="Y">
    <div class="filter__content">
        <div class="filter__title">
        <div class="row">
          <div class="col-xs-6"><?=GetMessage("TITLE")?></div>
          <div class="col-xs-6 right"><a href="<?=COption::GetOptionString("grain.customsettings","catalog_".LANGUAGE_ID)?>" class="filter__link"><?=svg('pdf')?><span><?=GetMessage("DOWNLOAD")?></span></a></div>
        </div>
        </div>
        <div class="row">
          <?foreach ($arResult['ITEMS'] as $item):
              $current = false;
            foreach($item['VALUES'] as $val):
                if($val['CHECKED']) $current = $val['VALUE'];
            endforeach;?>
            <div class="col-sm-6 col-lg-3">
              <div class="filter__dropdown dropdown">
                  <a href="#" class="dropdown__trigger">
                      <span><?=($current ? $current : GetMessage($item['CODE']))?></span><?=svg('down')?>
                  </a>
                  <div class="dropdown__frame">
                      <?foreach($item['VALUES'] as $val):?>
                        <a href="#" class="dropdown__item" data-id="<?=$val['CONTROL_NAME']?>"> <span><?=$val['VALUE']?></span></a>
                      <?endforeach;?>
                      <div class="hidden">
                          <?foreach($item['VALUES'] as $val):?>
                            <input type="checkbox" name="<?=$val['CONTROL_NAME']?>" value="Y">
                          <?endforeach;?>
                      </div>
                  </div>
              </div>
            </div>
        <?endforeach;?>
        </div>
        <div class="row">
        <div class="col-lg-3 col-sm-4">
            <button type="submit" class="filter__submit"><?=GetMessage("FIND")?></button>
        </div>
        <div class="col-lg-9 col-sm-8">
          <div class="filter__description"><?=GetMessage("HELP")?> </div>
        </div>
        </div>
    </div>
</form>
<?endif;?>
