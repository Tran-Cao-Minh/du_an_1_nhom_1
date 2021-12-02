<section class="interaction-form">
  <form>
    <?php
      if (isset($_GET['category_name'])) {
        $category_name = $_GET['category_name'];

      } else {
        $category_name = '';
      }
    ?>
    <div class="interaction-form__title--add">
      Thêm danh mục
    </div>
    <div class="interaction-form__form-group">
      <label for="category_name" class="interaction-form__form-title">
        Tên danh mục
      </label>
      <input type="text" name="category_name" id="category_name" class="interaction-form__input" 
        required
        maxlength="32"
        value="<?php echo $category_name; ?>"
      >
      <div class="interaction-form__notification">
        <!-- Some test case ~ -->
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