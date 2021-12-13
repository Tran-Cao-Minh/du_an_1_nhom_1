<section class="payment">
  <article class="payment__left">
    <!-- <div class="payment__left-promotional">
      <p>Nhập mã khuyến mãi Nếu có</p>
      <div class="payment__left-promotional-code">
        <input type="text" class="payment__left-promotional-input">
        <button class="payment__left-promotional-button">Áp dụng</button>
      </div>
    </div> -->
    <div class="payment__left-customer">
      <div class="payment__left-customer-tittle">
        Thông tin người nhận
      </div>
      <!-- <ul class="payment__left-customer-choose">
        <li class="payment__left-customer-choose-item">
          <input type="radio" name="customer" id="customer__self">
          <label class="customer__label" for="customer__self">Tôi</label>
        </li>
        <li class="payment__left-customer-choose-item">
          <input type="radio" name="customer" id="customer__other">
          <label for="customer__other" class="customer__label">Người khác</label>
        </li>
        <li class="payment__left-customer-choose-item">
          <input type="radio" name="customer" id="customer__new">
          <label for="customer__new" class="customer__label">Thêm mới</label>
        </li>
      </ul> -->
      <div class="payment__left-customer-form">
        <div class="form__group">
          <label class="form__label" for="">Họ và tên</label>
          <input class="js-name-pay-inf form__input form__input--primary" type="text" 
            placeholder="Nhập họ và tên người nhận" 
            value="<?php echo $user_name; ?>"
          />
          <span class="js-pay-notification form__message"></span>
        </div>
        <div class="form__group">
          <label class="form__label" for="">Số điện thoại</label>
          <input class="js-phone-pay-inf form__input form__input--primary" type="text" 
            placeholder="Nhập số điện thoại người nhận" 
            value="<?php echo $user_phone; ?>"
          />
          <span class="js-pay-notification form__message"></span>
        </div>
        <div class="form__group">
          <label class="form__label" for="">Địa chỉ</label>
          <input class="js-address-pay-inf form__input form__input--primary" type="text" placeholder="Nhập địa chỉ người nhận" />
          <span class="js-pay-notification form__message"></span>
        </div>
        <!-- <div class="form__group-btn">
          <button class="form__btn">
            Xác nhận
          </button>
        </div> -->
      </div>
    </div>
  </article>
  <aside class="payment__info">
    <div class="payment__info-method">
      <div class="payment__info-method-choose">
        <div class="payment__info-method-head">
          Phương thức thanh toán
        </div>
        <div class="payment__info-method-body">
          <div class="payment__info-method-item">
            <input type="radio" checked name="" id="direct">
            <label class="payment__info-method-label" for="direct">Trực tiếp</label>
          </div>
        </div>
      </div>
      <div class="payment__info-method-delivery">
        <div class="payment__info-method-head">
          Đơn vị giao hàng
        </div>
        <div class="payment__info-method-item">
          <input type="radio" checked name="" id="viettel-post">
          <label class="payment__info-method-label" for="viettel-post">Viettel Post</label>
        </div>
      </div>
    </div>
    <div class="payment__info-total">
      <div class="payment__info-total-head">
        Ghi chú
      </div>
      <div class="payment__info-method-note">
        <textarea class="js-note-pay-inf payment__info-total-note-area" placeholder="Nhập ghi chú của bạn..." name="" id=""></textarea>
      </div>
      <div class="payment__info-result">
        <!-- <div class="payment__info-result-1 payment__info-result-0">
          <p class="payment__info-result-name">Phí vận chuyển</p>
          <p class="payment__info-result-price">50.000 đ</p>
        </div> -->
        <!-- <div class="payment__info-result-2 payment__info-result-0">
          <p class="payment__info-result-name">Tổng tiền</p>
          <p class="payment__info-result-price">2.535.000 đ</p>
        </div> -->
        <!-- <div class="payment__info-result-3 payment__info-result-0">
          <p class="payment__info-result-name">Giảm giá</p>
          <p class="payment__info-result-price">20.000 đ</p>
        </div> -->
        <div class="payment__info-result-4 payment__info-result-0">
          <p class="payment__info-result-name--18">Tổng tiền</p>
          <p class="payment__info-result-price js-pay-sum">50.000 đ</p>
        </div>
        <div class="payment__info-result-5">
          <button class="payment__info-result-btn js-pay-btn js-btn-sign-in">
            Xác nhận thanh toán
          </button>
        </div>
      </div>
    </div>
  </aside>
</section>