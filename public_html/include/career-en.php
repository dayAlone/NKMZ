<div id="Career" tabindex="-1" role="dialog" aria-hidden="true" data-parsley-validate class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="right xs-margin-top xl-margin-bottom"><a data-dismiss="modal" href="#" class="close">Закрыть форму</a></div>
      <div class="vacancy-popup">
        <div class="modal__success success">
          <h3 class="center">Your application has been submitted successfully.</h3>
		  <p class="center">A representative of our company will contact you shortly. Thank you for applying.</p>

        </div>
        <form data-parsley-validate="" enctype="multipart/form-data" class="modal__form visible form">
          <h3 class="center">Response to the vacancy</h3>
          <input type="hidden" name="group_id" value="2">
          <input type="hidden" name="vacancy" value="">
          <div class="row">
            <div class="col-sm-12">
              <label>Your name <span>*</span></label>
              <input name="name" type="text" required="">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <label>Your contact phone number <span>*</span></label>
              <input name="phone" required="" type="text" data-parsley-pattern="/^((8|+7)[- ]?)?((?d{3})?[- ]?)?[d- ]{7,10}/" data-parsley-trigger="change">
            </div>
            <div class="col-sm-6">
              <label>Your email address</label>
              <input name="email" type="email">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <label>Tell us a few words about yourself, please:</label>
              <textarea name="message"></textarea>
            </div>
            <div class="col-sm-6">
              <div class="file">
                <div class="row">
                  <div class="col-xs-6">
                    <label for="file">Please attach your résumé <span>*</span></label>
                  </div>
                  <div class="col-xs-6 right">
                    <input type="file" name="resume" required="" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="hidden"><a href="#" class="file__trigger">Загрузить файл</a>
                  </div>
                </div>
                <div class="file__name"></div>
                <div class="file__description">Please note that we accept electronic files in PDF, DOC and DOCX format with the file size not exceeding 5 MB.</div>
              </div>
            </div>
          </div>
          <div class="modal__footer">
            <div class="row">
              <div class="col-sm-3 hidden-xs"><span class="modal__required">All fields<br> marked with an asterisk (<span>*</span>) are required.</span></div>
              <div class="col-sm-3">
                <label class="left">Enter this code</label>
                <div style="background-image:url(/include/captcha.php?captcha_sid=&lt;?=$code?&gt;)" class="captcha"></div>
                <input type="hidden" name="captcha_code" value="&lt;?=$code?&gt;"><a href="#" class="captcha__refresh"><?=svg('refresh')?></a>
              </div>
              <div class="col-sm-3">
                <label class="right">into this field</label>
                <input name="captcha_word" type="text" required="">
              </div>
              <div class="col-sm-3">
                <input type="submit" value="Submit">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
