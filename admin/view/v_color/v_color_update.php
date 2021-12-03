<section class="interaction-form">
  <form>
    <?php
      if ($object_data != '') {
        $object_id = $object_data['PkColor_Id'];
        $color_name = $object_data['ColorName'];

      } else {
        $object_id = '';
        $color_name = '';
      }
    ?>
    <div class="interaction-form__title--update">
      Sửa màu sắc
    </div>
    <div class="interaction-form__form-group">
      <div class="interaction-form__form-title">
        Mã màu sắc
      </div>
      <input  type="hidden" class="interaction-form__input"
        value="<?php echo $object_id; ?>"
        name="object_id">
      <input  type="color" class="interaction-form__input"
        value="<?php echo '#'.$object_id; ?>"
        name="new_object_id">
    </div>
    <div class="interaction-form__form-group">
      <label for="color_name" class="interaction-form__form-title">
        Tên màu sắc 
      </label>
      <input type="text" id="color_name" class="interaction-form__input"
        required
        maxlength="32"
        name="color_name"
        value="<?php echo $color_name; ?>"
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