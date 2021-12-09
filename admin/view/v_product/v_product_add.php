<section class="interaction-form">
  <form method="POST" enctype="multipart/form-data">
    <?php
      if (
        isset($_POST['product_name']) &&
        isset($_POST['product_price']) &&
        isset($_POST['product_sale']) &&
        isset($_POST['product_category_id']) &&
        isset($_POST['product_brand_id']) &&
        isset($_POST['product_view_status']) &&
        isset($_POST['product_variant_color_id'])
      ) {
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_sale = $_POST['product_sale'];
        $product_category_id = $_POST['product_category_id'];
        $product_brand_id = $_POST['product_brand_id'];
        $product_view_status = $_POST['product_view_status'];
        $product_variant_color_id = $_POST['product_variant_color_id'];

      } else {
        $product_name = '';
        $product_price = '';
        $product_sale = '';
        $product_category_id = '';
        $product_brand_id = '';
        $product_view_status = 1;
        $product_variant_color_id = '';
      }
    ?>
    <div class="interaction-form__title--add">
      Thêm sản phẩm
    </div>
    <div class="interaction-form__form-group">
      <label for="product_name" class="interaction-form__form-title">
        Tên sản phẩm
      </label>
      <input type="text" id="product_name" class="interaction-form__input"
        required 
        maxlength="80"
        name="product_name"
        value="<?php echo $product_name; ?>"
      >
      <div class="interaction-form__notification">
        <!-- Some test case ~ -->
      </div>
    </div>
    <div class="interaction-form__form-group">
      <label for="product_price" class="interaction-form__form-title">
        Giá sản phẩm (VND)
      </label>
      <input type="number" id="product_price" class="interaction-form__input"
        required 
        min="1000"
        max="1000000000"
        step="1"
        name="product_price" 
        value="<?php echo $product_price; ?>"
      >
      <div class="interaction-form__notification">
        <!-- Some test case ~ -->
      </div>
    </div>
    <div class="interaction-form__form-group">
      <label for="product_sale" class="interaction-form__form-title">
        Giảm giá (%)
      </label>
      <input type="number" id="product_sale" class="interaction-form__input"
        required 
        min="0"
        max="100"
        step="1"
        name="product_sale"
        value="<?php echo $product_sale; ?>"
      >
      <div class="interaction-form__notification">
        <!-- Some test case ~ -->
      </div>
    </div>
    <div class="interaction-form__form-group">
      <div class="interaction-form__form-title">
        Danh mục
      </div>
      <select name="product_category_id" class="interaction-form__select-input">
        <?php
          if ($category_list != '') {
            foreach ($category_list as $category) {
              if ($category['PkType_Id'] != $product_category_id) {
                echo '
                  <option value="'.$category['PkType_Id'].'" class="interaction-form__select-option">
                    '.$category['TypeName'].'
                  </option>
                ';
              } else {
                echo '
                  <option selected value="'.$category['PkType_Id'].'" class="interaction-form__select-option">
                    '.$category['TypeName'].'
                  </option>
                ';
              }
            }
          } else {
            echo '
              <option value="" class="interaction-form__select-option">
                Hãy thêm ít nhất một danh mục
              </option>
            ';
          }
        ?>
      </select>
    </div>
    <div class="interaction-form__form-group">
      <div class="interaction-form__form-title">
        Thương hiệu
      </div>
      <select name="product_brand_id" class="interaction-form__select-input">
        <?php
          if ($brand_list != '') {
            foreach ($brand_list as $brand) {
              if ($brand['PkBrand_Id'] != $product_brand_id) {
                echo '
                  <option value="'.$brand['PkBrand_Id'].'" class="interaction-form__select-option">
                    '.$brand['BrandName'].'
                  </option>
                ';
              } else {
                echo '
                  <option selected value="'.$brand['PkBrand_Id'].'" class="interaction-form__select-option">
                    '.$brand['BrandName'].'
                  </option>
                ';
              }
            }
          } else {
            echo '
              <option value="" class="interaction-form__select-option">
                Hãy thêm ít nhất một thương hiệu
              </option>
            ';
          }
        ?>
      </select>
    </div>
    <div class="interaction-form__form-group">
      <div class="interaction-form__form-title">
        Trạng thái
      </div>
      <div class="interaction-form__radio-group">
        <?php if ($product_view_status == 1): ?>
          <div class="interaction-form__radio-item-50">
            <input type="radio" class="interaction-form__input--hidden" id="show" 
              checked 
              name="product_view_status"
              value="1"
            >
            <label for="show" class="interaction-form__radio-item-label">
              Hiển thị
            </label>
          </div>
          <div class="interaction-form__radio-item-50">
            <input type="radio" class="interaction-form__input--hidden" id="hide" 
              name="product_view_status"
              value="0"
            >
            <label for="hide" class="interaction-form__radio-item-label">
              Ẩn
            </label>
          </div>
        <?php else: ?>
          <div class="interaction-form__radio-item-50">
            <input type="radio" class="interaction-form__input--hidden" id="show" 
              name="product_view_status"
              value="1"
            >
            <label for="show" class="interaction-form__radio-item-label">
              Hiển thị
            </label>
          </div>
          <div class="interaction-form__radio-item-50">
            <input type="radio" class="interaction-form__input--hidden" id="hide" 
              checked 
              name="product_view_status"
              value="0"
            >
            <label for="hide" class="interaction-form__radio-item-label">
              Ẩn
            </label>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="interaction-form__title--sub">
      Biến thể chính
    </div>
    <div class="interaction-form__form-group">
      <div class="interaction-form__form-title">
        Màu sắc
      </div>
      <div class="interaction-form__color-group">
        <?php
          if ($color_list != '') {
            foreach ($color_list as $color) {
              if ($product_variant_color_id == '') {
                $product_variant_color_id = $color_list[0]['PkColor_Id']; 
              }
              if ($color['PkColor_Id'] != $product_variant_color_id) {
                echo '
                  <label for="'.$color['PkColor_Id'].'" class="interaction-form__color-item"
                    title="'.$color['ColorName'].'"
                  >
                    <input class="interaction-form__input--hidden" type="radio" 
                      id="'.$color['PkColor_Id'].'"
                      name="product_variant_color_id"
                      value="'.$color['PkColor_Id'].'"
                    >
                    <div class="interaction-form__color-icon" 
                      style="--bg-color:#'.$color['PkColor_Id'].';">
                    </div>
                  </label>
                ';
              } else {
                echo '
                  <label for="'.$color['PkColor_Id'].'" class="interaction-form__color-item"
                    title="'.$color['ColorName'].'"
                  >
                    <input checked class="interaction-form__input--hidden" type="radio" 
                      id="'.$color['PkColor_Id'].'"
                      name="product_variant_color_id"
                      value="'.$color['PkColor_Id'].'"
                    >
                    <div class="interaction-form__color-icon" 
                      style="--bg-color:#'.$color['PkColor_Id'].';">
                    </div>
                  </label>
                ';
              }
            }
          } else {
            echo '
              <a href="?page_name=manage_color&view_name=add&previous_page=add_product" class="interaction-form__color-item--add-btn" title="Thêm màu sắc">
                <div class="interaction-form__color-icon--contain-add-icon">
                  <i class="fas fa-plus interaction-form__color-icon--add-icon"></i>
                </div>
              </a>
            ';
          }
        ?>
      </div>
    </div>
    <div class="interaction-form__form-group">
      <label for="product_variant_main_img" class="interaction-form__form-title">
        Hình ảnh chính
      </label>
      <label for="product_variant_main_img" class="interaction-form__form-title--main-img">
        <div class="interaction-form__main-img-area">
          <i class="fas fa-image interaction-form__main-img-icon"></i>
          <img class="interaction-form__main-img js-preview-img" src="">
        </div>
      </label>
      <input type="file" class="interaction-form__input--hidden js-img-input" id="product_variant_main_img"
        required
        accept="image/*" 
        name="product_variant_main_img" 
      >
      <div class="interaction-form__notification js-img-notification">
        <!-- Some test case ~ -->
      </div>
    </div>
    <div class="interaction-form__form-group">
      <label for="product_variant_sub_img_list" class="interaction-form__form-title">
        Hình ảnh phụ (4 ~ 10 ảnh)
      </label>
      <label for="product_variant_sub_img_list" class="interaction-form__img-custom-input">
        Tải ảnh lên
      </label>
      <input type="file" class="js-multiple-img-input interaction-form__input--hidden" id="product_variant_sub_img_list"
        required
        multiple 
        accept="image/*" 
        name="product_variant_sub_img_list[]"
      >
      <div class="interaction-form__sub-img-group js-multiple-img-container">
        <!-- add img when up file by preview_multiple_img.js -->
      </div>
      <div class="interaction-form__notification js-preview-multiple-img-notification">
        <!-- Some test case ~ -->
      </div>
    </div>
    <div class="interaction-form__form-group">
      <ul class="interaction-form__sub-variant-group js-sub-variant-container">
        <li class="interaction-form__sub-variant-title">
          <div class="interaction-form__sub-variant-title-cell-1">
            Kích cỡ
          </div>
          <div class="interaction-form__sub-variant-title-cell-2">
            Số lượng (Đôi giày)
          </div>
          <div class="interaction-form__sub-variant-title-cell-3"></div>
        </li>
        <li class="interaction-form__sub-variant-row">
          <div class="interaction-form__sub-variant-row-cell-1">
            <input type="number" class="interaction-form__sub-variant-size-input" 
              required 
              min="1" 
              max="99"
              step="1"
              name="product_variant_size_list[]"
            >
          </div>
          <div class="interaction-form__sub-variant-row-cell-2">
            <input type="number" class="interaction-form__sub-variant-quantity-input" 
              required 
              min="0" 
              max="1000000000"
              step="1"
              name="product_variant_quantity_list[]"
            >
          </div>
          <div class="interaction-form__sub-variant-row-cell-3">
          </div>
        </li>
      </ul>
      <button type="button" class="interaction-form__sub-variant-add-btn js-add-sub-variant-btn">
        Thêm kích cỡ
      </button>
    </div>
    <?php if (isset($product_id)): ?>
      <a href="?view_name=add_variant&product_id=<?php echo $product_id; ?>" class="interaction-form__add-variant-btn">
        Thêm biến thể
      </a>
    <?php endif; ?>
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