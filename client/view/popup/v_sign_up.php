<div class="overlay-4">
  <section class="form">
    <form action="../ajax/ajax_sign_up_validation.php" class="form__register">
      <!-- Start form group -->
      <div class="form__group pb1-5 pt3-5">
        <label class="form__label" for="">Email</label>
        <input class="
        js-email-input 
        js-email-check-php
        form__input 
        form__input--primary" type="text" placeholder="Nhập email của bạn" />
        <span class="
        form__message
        js-email-sign-up-message
        "></span>
      </div>
      <!-- End form group -->
      <!-- Start form group -->
      <div class="form__group pb1-5">
        <label class="form__label" for="">Họ và tên</label>
        <input class="
        js-name-input 
        js-name-check-php
        form__input 
        form__input--primary" type="text" placeholder="Nhập họ tên của bạn" />
        <span class="
        form__message
        js-name-sign-up-message
        "></span>
      </div>
      <!-- End form group -->
      <!-- Start form group -->
      <div class="form__group pb1-5 form__date">
        <label class="form__label" for="">Ngày sinh</label>
        <input class="
        js-date-input 
        js-date-check-php
        form__input form__input--primary" type="date" />
        <span class="
        form__message
        js-date-sign-up-message
        "></span>
        <!-- <p class="form__date__icon"><i class="far fa-calendar-alt"></i></p> -->
      </div>
      <!-- End form group -->
      <!-- Start form group -->
      <div class="form__group pb1-5">
        <label class="form__label" for="">Giới tính</label>
        <div class="form__sex">
          <div class="form__sex-item">
            <input class="js-sex-input" type="radio" name="gender" value="1" checked id="male">
            <label for="male" class="form__sex-label">Nam</label>
          </div>
          <div class="form__sex-item">
            <input class="js-sex-input" type="radio" name="gender" value="0" id="female">
            <label for="female" class="form__sex-label">Nữ</label>
          </div>
          <div class="form__sex-item">
            <input class="js-sex-input" type="radio" name="gender" value="2" id="lgbt">
            <label for="lgbt" class="form__sex-label">Khác</label>
          </div>
        </div>
      </div>
      <!-- End form group -->
      <!-- Start form group -->
      <div class="form__group pb1-5 form__password">
        <label class="form__label" for="">Mật khẩu</label>
        <input class="
        js-password-input
        js-password-input-check 
        js-password-check-php
        form__input" type="password" placeholder="Nhập mật khẩu của bạn" />
        <span class="
        form__message
        js-password-sign-up-message
        "></span>
        <p class="  js-show-password form__password__icon">
          <i class="far fa-eye "></i>
        </p>
        <span class="form__message"></span>
      </div>
      <!-- End form group -->
      <!-- Start form group -->
      <div class="form__group pb1-5 form__password">
        <label class="form__label" for="">Nhập lại mật khẩu của bạn </label>
        <input class="
        js-password-input 
        js-re-password-input
        js-re-password-check-php 
        form__input" type="password" placeholder="Nhập mật khẩu của bạn" />
        <span class="form__message"></span>
        <p class=" js-show-password form__password__icon">
          <i class="far fa-eye "></i>
        </p>
        <!-- <span class="form__message"></span> -->
      </div>
      <!-- End form group -->
      <!-- Start form group -->
      <div class="form__group mb2-5">
        <button class="
                form__button
                js-btn-sign-in
                js-sign-up-check-btn
                " type="button">Đăng ký</button>
      </div>
      <!-- <span class="form__message js-sign-up-form-message" style="margin: top -3rem !important;"></span> -->
      <!-- End form group -->
    </form>
    <div class="form__close js-sign-up-close-3">
      <span class="form__close__icon"><i class="fas fa-times"></i> </span>
    </div>
  </section>
</div>