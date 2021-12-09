<section class="interaction-form">
  <form method="POST">
    <?php
      if (
        isset($_POST['account_name']) &&
        isset($_POST['account_phone']) &&
        isset($_POST['account_email']) &&
        isset($_POST['account_role']) &&
        isset($_POST['account_status'])
      ) {
        $account_name = $_POST['account_name'];
        $account_phone = $_POST['account_phone'];
        $account_email = $_POST['account_email'];
        $account_role = $_POST['account_role'];
        $account_status = $_POST['account_status'];

      } else {
        $account_name = '';
        $account_phone = '';
        $account_email = '';
        $account_role = '';
        $account_status = '';
      }
    ?>
    <div class="interaction-form__title--add">
      Thêm tài khoản
    </div>
    <div class="interaction-form__form-group">
      <label for="account_name" class="interaction-form__form-title">
        Họ và tên
      </label>
      <input type="text" id="account_name" class="interaction-form__input" 
        required
        maxlength="80"
        name="account_name" 
        value="<?php echo $account_name; ?>"
      >
      <div class="interaction-form__notification">
        <!-- Some test case ~ -->
      </div>
    </div>
    <div class="interaction-form__form-group">
      <label for="account_phone" class="interaction-form__form-title">
        Số điện thoại
      </label>
      <input type="text" id="account_phone" class="interaction-form__input" 
        required
        name="account_phone" 
        pattern="[0-9]{10,11}"
        value="<?php echo $account_phone; ?>"
      >
      <div class="interaction-form__notification">
        <!-- Some test case ~ -->
      </div>
    </div>
    <div class="interaction-form__form-group">
      <label for="account_email" class="interaction-form__form-title">
        Email
      </label>
      <input type="email" id="account_email" class="interaction-form__input" 
        required
        maxlength="80"
        name="account_email" 
        value="<?php echo $account_email; ?>"
      >
      <div class="interaction-form__notification">
        <!-- Some test case ~ -->
      </div>
    </div>
    <div class="interaction-form__form-group">
      <div class="interaction-form__form-title">
        Chức vụ
      </div>
      <select name="account_role" class="interaction-form__select-input">
        <?php if ($account_role == 0): ?>
          <option selected value="0" class="interaction-form__select-option">
            Người dùng
          </option>
          <option value="1" class="interaction-form__select-option">
            Quản trị viên
          </option>
        <?php else: ?>
          <option value="0" class="interaction-form__select-option">
            Người dùng
          </option>
          <option selected value="1" class="interaction-form__select-option">
            Quản trị viên
          </option>
        <?php endif; ?>
      </select>
    </div>
    <div class="interaction-form__form-group">
      <div class="interaction-form__form-title">
        Trạng thái
      </div>
      <div class="interaction-form__radio-group">
        <?php if ($account_status == 1): ?>
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
    </div>
    <div class="interaction-form__action-group">
      <button type="submit" name="insert_confirm" value="true" class="interaction-form__submit-btn--add">
        Xác nhận thêm
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