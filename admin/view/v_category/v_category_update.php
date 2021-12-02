<section class="interaction-form">
  <form>
    <?php
      if ($object_data != '') {
        $object_id = $object_data['PkType_Id'];
        $category_name = $object_data['TypeName'];

      } else {
        $object_id = '';
        $category_name = '';
      }
    ?>
    <div class="interaction-form__title--update">
      Sửa danh mục
    </div>
    <div class="interaction-form__form-group">
      <div class="interaction-form__form-title">
        Mã danh mục
      </div>
      <input  type="text" class="interaction-form__input--read-only"
        readonly
        value="<?php echo $object_id; ?>"
        name="object_id">
    </div>
    <div class="interaction-form__form-group">
      <label for="category_name" class="interaction-form__form-title">
        Tên danh mục 
      </label>
      <input type="text" id="category_name" class="interaction-form__input"
        value="<?php echo $category_name; ?>"
        name="category_name"
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