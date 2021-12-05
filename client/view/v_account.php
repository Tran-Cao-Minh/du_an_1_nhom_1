<section class="account">
  <article class="account__article">
    <div class="account__article-left">
      <div class="account__image">
        <img src="/public/image/site/home_page/girl.jpg" alt="">
        <div class="account__image-icon">
          <i class="fas fa-camera"></i>
        </div>
      </div>
      <div class="account__btn">
        <button class="account__btn-log-out">
          Đăng xuất
        </button>
        <button class="account__btn-change-pass">
          Đổi mật khẩu
        </button>
      </div>
    </div>
    <div class="account__article-right">
      <div class="form__group">
        <label class="form__label" for="">Họ và tên</label>
        <input class="form__input form__input--primary" type="text" placeholder="Mikaki" />
      </div>
      <div class="form__group">
        <label class="form__label" for="">Giới tính</label>
        <div class="form__sex">
          <div class="form__sex-item">
            <input type="radio" name="gender" id="male">
            <label for="male" class="form__sex-label">Nam</label>
          </div>
          <div class="form__sex-item">
            <input type="radio" name="gender" id="female">
            <label for="female" class="form__sex-label">Nữ</label>
          </div>
          <div class="form__sex-item">
            <input type="radio" name="gender" id="lgbt">
            <label for="lgbt" class="form__sex-label">Khác</label>
          </div>
        </div>
      </div>
      <div class="form__group">
        <label class="form__label" for="">Ngày sinh</label>
        <input class="form__input form__input--primary" type="text" placeholder="06/09/2002" />
        <div class="form__group-icon-calendar">
          <i class="far fa-calendar-alt"></i>
        </div>
      </div>
      <div class="form__group">
        <label class="form__label" for="">Địa chỉ</label>
        <textarea name="" id=""> Việt Nam Trái Đất
                    </textarea>
      </div>
      <div class="account__btn">
        <button class="account__btn-accept">
          Xác nhận thay đổi
        </button>
      </div>
    </div>
  </article>
  <aside class="account__aside">
    <div class="form__group">
      <label class="form__label" for="">Email</label>
      <div class="form__flex">
        <input class="form__input form__input--primary" type="text" placeholder="69@gmail.com" />
        <div class="account__btn">
          <button class="account__btn-accept-change">
            Thay đổi
          </button>
        </div>
      </div>
    </div>
    <div class="form__group ">
      <label class="form__label" for="">Số điện thoại</label>
      <div class="form__flex">
        <input class="form__input form__input--primary" type="text" placeholder="0933564889" />
        <div class="account__btn">
          <button class="account__btn-accept-change">
            Thay đổi
          </button>
        </div>
      </div>
    </div>
    <button class="top-bar__tile-bar-my-shopping-cart">
      Giỏ hàng của tôi
      <i class="fas fa-shopping-basket my-shopping-cart__icon"></i>
    </button>
  </aside>
</section>