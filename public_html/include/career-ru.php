<div id="Career" tabindex="-1" role="dialog" aria-hidden="true" data-parsley-validate class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="right xs-margin-top xl-margin-bottom"><a data-dismiss="modal" href="#" class="close">Закрыть форму</a></div>
      <div class="vacancy-popup">
        <div class="modal__success">
          <h3 class="center">Ваша заявка успешно отправлена.</h3>
          <p class="center">В ближайшее время представители нашей компании свяжутся с вами. Благодарим за обращение.</p>
        </div>
        <form data-parsley-validate="" enctype="multipart/form-data" class="modal__form visible">
          <h3 class="center">Отправка резюме в базу соискателей</h3>
          <input type="hidden" name="group_id" value="6">
          <input type="hidden" name="vacancy" value="">
          <div class="row">
            <div class="col-sm-12">
              <label>представьтесь, пожалуйста <span>*</span></label>
              <input name="name" type="text" required="">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <label>номер телефона для связи с вами <span>*</span></label>
              <input name="phone" required="" type="text" data-parsley-pattern="/^((8|+7)[- ]?)?((?d{3})?[- ]?)?[d- ]{7,10}/" data-parsley-trigger="change">
            </div>
            <div class="col-sm-6">
              <label>e-mail для связи с вами</label>
              <input name="email" type="email">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <label>расскажите немного о себе, пожалуйста</label>
              <textarea name="message"></textarea>
            </div>
            <div class="col-sm-6">
              <div class="file">
                <div class="row">
                  <div class="col-xs-6">
                    <label for="file">приложите, пожалуйста, ваше резюме <span>*</span></label>
                  </div>
                  <div class="col-xs-6 right">
                    <input type="file" name="resume" required="" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="hidden"><a href="#" class="file__trigger">Загрузить файл</a>
                  </div>
                </div>
                <div class="file__name"></div>
                <div class="file__description">Обратите внимание, мы принимаем файлы в форматах PDF, DOC, DOCX, размером не более 5 Мб.<br>Мы не рассматриваем заявки без резюме.</div>
              </div>
            </div>
          </div>
          <div class="modal__footer">
            <div class="row">
              <div class="col-sm-3 hidden-xs"><span class="modal__required">Поля, отмеченные<br>	знаком <span>*</span>	обязательны<br>	к заполнению.</span></div>
              <div class="col-sm-3">
                <label class="left">введите <span class="hidden-xs">данный</span>	код</label>
                <div style="background-image:url(/include/captcha.php?captcha_sid=&lt;?=$code?&gt;)" class="captcha"></div>
                <input type="hidden" name="captcha_code" value="&lt;?=$code?&gt;"><a href="#" class="captcha__refresh"><?=svg('refresh')?></a>
              </div>
              <div class="col-sm-3">
                <label class="right">в это поле</label>
                <input name="captcha_word" type="text" required="">
              </div>
              <div class="col-sm-3">
                <input type="submit" value="Отправить">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
