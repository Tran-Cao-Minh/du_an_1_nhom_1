<section class="interaction-form">
  <form>
    <?php
      if (
        isset($_GET['object_id']) &&
        isset($_GET['color_name'])
      ) {
        $object_id = $_GET['object_id'];
        $color_name = $_GET['color_name'];

      } else {
        $object_id = '';
        $color_name = '';
      }
    ?>
    <div class="interaction-form__title--add">
      Thêm màu sắc
    </div>
    <div class="interaction-form__form-group">
      <label for="color_name" class="interaction-form__form-title">
        Mã màu sắc
      </label>
      <input type="color" id="object_id" class="interaction-form__input" 
        required
        name="object_id" 
        value="<?php echo $object_id; ?>"
      >
      <div class="interaction-form__notification">
        <!-- Some test case ~ -->
      </div>
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
      <button type="submit" name="insert_confirm" value="true" class="interaction-form__submit-btn--add">
        Xác nhận thêm
      </button>
      <?php
        if (isset($_GET['previous_page'])) {
          $previous_page = $_GET['previous_page'];

          switch ($previous_page) {
            case 'add_product':
              $return_link = '?page_name=manage_product&view_name=add';
              break;

            case 'add_product_variant':
              $return_link = '?page_name=manage_product&view_name=add_variant&product_id='.$_GET['object_id'];
              break;
          }

          $_SESSION['v_color_add_return_link'] = $return_link;
        } 

        if (!isset($_SESSION['v_color_add_return_link'])) {
          $return_link = '?view_name=overview';

        } else {
          $return_link = $_SESSION['v_color_add_return_link'];
        }
      ?>
      <a href="<?php echo $return_link; ?>" class="interaction-form__return-link">
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