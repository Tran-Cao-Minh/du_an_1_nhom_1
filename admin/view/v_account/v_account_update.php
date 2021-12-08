<section class="interaction-form">
  <form method="POST">
    <div class="interaction-form__title--update">
      Cập nhật tài khoản
    </div>
    <div class="interaction-form__form-group">
      <div class="interaction-form__form-title">
        Họ và tên
      </div>
      <input type="text" class="interaction-form__input" 
        readonly
        value="<?php echo $object_data['CustomerName']; ?>"
      >
    </div>
    <div class="interaction-form__form-group">
      <div class="interaction-form__form-title">
        Số điện thoại
      </div>
      <input type="text" class="interaction-form__input" 
        readonly
        value="<?php echo $object_data['CustomerPhone']; ?>"
      >
    </div>
    <div class="interaction-form__form-group">
      <div class="interaction-form__form-title">
        Email
      </div>
      <input type="text" class="interaction-form__input" 
        readonly
        value="<?php echo $object_data['CustomerEmail']; ?>"
      >
    </div>
    <div class="interaction-form__form-group">
      <div class="interaction-form__form-title">
        Chức vụ
      </div>
      <?php if ($object_data['AccountRole'] == 0): ?>
        <select name="account_role" class="interaction-form__select-input">
          <option selected value="0" class="interaction-form__select-option">
            Người dùng
          </option>
          <option value="1" class="interaction-form__select-option">
            Quản trị viên
          </option>
        </select>
      <?php else: ?>
        <input type="text" class="interaction-form__input" 
          readonly
          value="Quản trị viên"
          name="account_role"
        >
      <?php endif; ?>
    </div>
    <div class="interaction-form__form-group">
      <div class="interaction-form__form-title">
        Trạng thái
      </div>
      <?php if ($object_data['AccountRole'] == 0): ?>
        <div class="interaction-form__radio-group">
          <?php if ($object_data['AccountStatus'] == 1): ?>
            <div class="interaction-form__radio-item-50">
              <input type="radio" class="interaction-form__input--hidden" id="show" 
                checked 
                name="account_status"
                value="1"
              >
              <label for="show" class="interaction-form__radio-item-label">
                Kích hoạt
              </label>
            </div>
            <div class="interaction-form__radio-item-50">
              <input type="radio" class="interaction-form__input--hidden" id="hide" 
                name="account_status"
                value="0"
              >
              <label for="hide" class="interaction-form__radio-item-label">
                Vô hiệu
              </label>
            </div>
          <?php else: ?>
            <div class="interaction-form__radio-item-50">
              <input type="radio" class="interaction-form__input--hidden" id="show" 
                name="account_status"
                value="1"
              >
              <label for="show" class="interaction-form__radio-item-label">
                Kích hoạt
              </label>
            </div>
            <div class="interaction-form__radio-item-50">
              <input type="radio" class="interaction-form__input--hidden" id="hide" 
                checked 
                name="account_status"
                value="0"
              >
              <label for="hide" class="interaction-form__radio-item-label">
                Vô hiệu
              </label>
            </div>
          <?php endif; ?>
        </div>
      <?php else: ?>
        <?php if ($object_data['AccountStatus'] == 1): ?>
          <div class="interaction-form__radio-item-50">
            <input type="radio" class="interaction-form__input--hidden" 
              checked 
              name="account_status"
            >
            <div class="interaction-form__radio-item-label">
              Kích hoạt
            </div>
          </div>
        <?php else: ?>
          <div class="interaction-form__radio-item-50">
            <input type="radio" class="interaction-form__input--hidden" 
              checked 
              name="account_status"
            >
            <div class="interaction-form__radio-item-label">
              Vô hiệu
            </div>
          </div>
        <?php endif; ?>
      <?php endif; ?>
    </div>
    <div class="interaction-form__action-group">
      <input type="hidden" name="account_id" value="<?php echo $object_data['PkCustomer_Id'] ?>">
      <button type="submit" class="interaction-form__submit-btn--update"
        name="update_confirm" value="true">
        Xác nhận sửa
      </button>
      <a href="?view_name=overview" class="interaction-form__return-link">
        Quay lại
      </a>
    </div>
  </form>
</section>

<section class="notification">
  <span class="notification__title">Thông báo: </span>
  <span class="notification__content">
    <?php echo $notification; ?>
  </span>
</section>