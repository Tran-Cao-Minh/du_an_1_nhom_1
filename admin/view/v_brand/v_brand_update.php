<section class="interaction-form">
  <form>
    <?php
      if ($object_data != '') {
        $object_id = $object_data['PkBrand_Id'];
        $brand_name = $object_data['BrandName'];

      } else {
        $object_id = '';
        $brand_name = '';
      }
    ?>
    <div class="interaction-form__title--update">
      Sửa thương hiệu
    </div>
    <div class="interaction-form__form-group">
      <div class="interaction-form__form-title">
        Mã thương hiệu
      </div>
      <input  type="text" class="interaction-form__input--read-only"
        readonly
        value="<?php echo $object_id; ?>"
        name="object_id">
    </div>
    <div class="interaction-form__form-group">
      <label for="brand_name" class="interaction-form__form-title">
        Tên thương hiệu 
      </label>
      <input type="text" id="brand_name" class="interaction-form__input"
        required
        maxlength="32"
        name="brand_name"
        value="<?php echo $brand_name; ?>"
      >
      <div class="interaction-form__notification">
        <!-- Some test case ~ -->
      </div>
    </div>
    <div class="interaction-form__action-group">
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