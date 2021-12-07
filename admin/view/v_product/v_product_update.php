<section class="interaction-form">
  <form>
    <div class="interaction-form__title--update">
      Sửa sản phẩm
    </div>
    <div class="interaction-form__form-group">
      <label for="product_name" class="interaction-form__form-title">
        Tên sản phẩm
      </label>
      <input type="hidden" 
        name="product_old_name"
        value="<?php echo $product_data['ProductName']; ?>"
      >
      <input type="text" id="product_name" class="interaction-form__input"
        required 
        maxlength="80"
        name="product_name"
        value="<?php echo $product_data['ProductName']; ?>"
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
              if ($category['PkType_Id'] != $product_data['FkType_Id']) {
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
              if ($brand['PkBrand_Id'] != $product_data['FKBrand_Id']) {
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
          } 
        ?>
      </select>
    </div>
    <?php
      if (isset($_POST['product_variant_color_id'])) {
        $product_variant_color_id = $_POST['product_variant_color_id'];
        echo '
          <input 
            checked
            type="checkbox" 
            id="interaction-form__collapse-product-form" 
            style="display: none;"
          >
        ';

      } else {
        $product_variant_color_id = '';
        echo '
          <input 
            type="checkbox" 
            id="interaction-form__collapse-product-form" 
            style="display: none;"
          >
        ';
      }
    ?>
    <div class="interaction-form__collapse-product-form">
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
          value="<?php echo $product_data['ProductPrice']; ?>"
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
          value="<?php echo $product_data['ProductDiscount']; ?>"
        >
        <div class="interaction-form__notification">
          <!-- Some test case ~ -->
        </div>
      </div>
      <div class="interaction-form__form-group">
        <div class="interaction-form__form-title">
          Trạng thái
        </div>
        <div class="interaction-form__radio-group">
          <?php if ($product_data['ProductViewStatus'] == 1): ?>
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
                value="show"
              >
              <label for="show" class="interaction-form__radio-item-label">
                Hiển thị
              </label>
            </div>
            <div class="interaction-form__radio-item-50">
              <input type="radio" class="interaction-form__input--hidden" id="hide" 
                checked 
                name="product_view_status"
                value="hide"
              >
              <label for="hide" class="interaction-form__radio-item-label">
                Ẩn
              </label>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="interaction-form__action-group">
        <input type="hidden" name="object_id" value="<?php echo $product_id; ?>">
        <button type="submit" name="update_product_confirm" value="true" class="interaction-form__submit-btn--update">
          Xác nhận sửa
        </button>
        <a href="?view_name=overview" class="interaction-form__return-link">
          Quay lại
        </a>
      </div>
    </div>
  </form>

  <div class="interaction-form__variant-list-group">
    <div class="interaction-form__title--sub">
      Danh sách biến thể
    </div>
    <div class="interaction-form__color-group">
      <?php
        if ($product_choosen_color_list != '') {
          foreach ($product_choosen_color_list as $color) {
            if ($color['PkColor_Id'] != $product_variant_color_id) {
              echo '
                <label 
                  data-color-id="'.$color['PkColor_Id'].'"
                  for="'.$color['PkColor_Id'].'" 
                  class="interaction-form__color-item js-open-variant-form"
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
                <label 
                  data-color-id="'.$color['PkColor_Id'].'"
                  for="'.$color['PkColor_Id'].'" 
                  class="interaction-form__color-item js-open-variant-form"
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
        } 
        echo '
          <a 
            href="?view_name=add_variant&product_id='.$product_id.'" 
            class="interaction-form__color-item--add-btn" title="Thêm màu sắc"
          >
            <div class="interaction-form__color-icon--contain-add-icon">
              <i class="fas fa-plus interaction-form__color-icon--add-icon"></i>
            </div>
          </a>
        ';
      ?>
    </div>
  </div> 

  <?php 
    foreach ($product_choosen_color_list as $color) {
      if ($color['PkColor_Id'] != $product_variant_color_id) {
        $product_variant_form_max_height = '0rem';

      } else {
        $product_variant_form_max_height = '1000rem';
      }

      $color_id = $color['PkColor_Id'];
      $product_variant_inf_list = getProductVariantInf($product_id, $color_id);
      $product_variant_img_list = getProductVariantImg($product_id, $color_id);

      $product_variant_sub_img = '';
      $i = 0;
      foreach ($product_variant_img_list as $product_variant_img) {
        if ($i == 0) {
          $product_variant_main_img_id = $product_variant_img['PkImage_Id'];
          $product_variant_main_img_link = $product_variant_img['ImageFileName'];
          $i = 1;

        } else {
          $product_variant_sub_img_id = $product_variant_img['PkImage_Id'];
          $product_variant_sub_img_link = $product_variant_img['ImageFileName'];

          $product_variant_sub_img .= '
            <label for="'.$product_variant_sub_img_id.'" class="interaction-form__contain-sub-img">
              <input 
                id="'.$product_variant_sub_img_id.'" 
                type="checkbox" 
                class="js-delete-sub-img interaction-form__delete-sub-img-uploaded"
              >
              <input 
                type="hidden" 
                name="sub_img_uploaded[]"
                value="'.$product_variant_sub_img_id.'"
              >
              <div class="interaction-form__check-delete-sub-img-uploaded">
                <i class="interaction-form__check-delete-sub-img-uploaded-icon fas fa-check"></i>
              </div>
              <img class="interaction-form__sub-img" src="../public/image/product/'.$product_variant_sub_img_link.'">
            </label>
          ';
        }
      }

      $product_variant_row = '';
      $i = 0;
      foreach ($product_variant_inf_list as $product_variant_inf) {
        $product_variant_size = $product_variant_inf['ProductSize'];
        $product_variant_quantity = $product_variant_inf['ProductQuantity'];
        $product_variant_row .= '
          <li class="interaction-form__sub-variant-row">
            <div class="interaction-form__sub-variant-row-cell-1">
              <input type="number" class="interaction-form__sub-variant-size-input" 
                required 
                min="1" 
                max="99"
                step="1"
                name="product_variant_size_list[]"
                value="'.$product_variant_size.'"
              >
            </div>
            <div class="interaction-form__sub-variant-row-cell-2">
              <input type="number" class="interaction-form__sub-variant-quantity-input" 
                required 
                min="0" 
                max="1000000000"
                step="1"
                name="product_variant_quantity_list[]"
                value="'.$product_variant_quantity.'"
              >
            </div>
        ';
        if ($i == 0) {
          $product_variant_row .= '
            <div class="interaction-form__sub-variant-row-cell-3"></div>
          ';
          $i = 1;
        } else {
          $product_variant_row .= '
            <div class="interaction-form__sub-variant-row-cell-3">
              <button type="button" class="interaction-form__sub-variant-delete-btn js-delete-sub-variant-btn">
                <i class="fas fa-times interaction-form__sub-variant-delete-icon"></i>
              </button>
            </div>
          ';
        }
        $product_variant_row .= '</li>';
      }

      echo '
        <form 
          method="POST" enctype="multipart/form-data"
          data-color-id="'.$color_id.'" 
          class="interaction-form__variant-inf js-variant-form"
          style="max-height:'.$product_variant_form_max_height.';"
        >
          <div class="interaction-form__form-group">
            <label for="product_variant_main_img_'.$color_id.'" class="interaction-form__form-title">
              Hình ảnh chính
            </label>
            <label for="product_variant_main_img_'.$color_id.'" class="interaction-form__form-title--main-img">
              <div class="interaction-form__main-img-area">
                <i class="fas fa-image interaction-form__main-img-icon"></i>
                <img class="interaction-form__main-img-uploaded" 
                  src="../public/image/product/'.$product_variant_main_img_link.'"
                >
                <img class="interaction-form__main-img js-preview-img" src="">
              </div>
            </label>
            <input type="hidden" 
              name="product_variant_main_img_id"
              value="'.$product_variant_main_img_id.'"
            >
            <input type="file" class="interaction-form__input--hidden js-img-input" 
              id="product_variant_main_img_'.$color_id.'"
              accept="image/*" 
              name="product_variant_main_img" 
            >
            <div class="interaction-form__notification js-img-notification">
              <!-- Some test case ~ -->
            </div>
          </div>
          <div class="interaction-form__form-group">
            <label 
              for="product_variant_sub_img_list_'.$color_id.'" 
              class="interaction-form__form-title"
            >
              Hình ảnh phụ (4 ~ 10 ảnh)
            </label>
            <div class="interaction-form__sub-img-group">
              '.$product_variant_sub_img.'    
            </div>
            <div class="interaction-form__action-group-m0">
              <label for="product_variant_sub_img_list_'.$color_id.'" class="interaction-form__img-custom-input-50">
                Tải ảnh lên
              </label>
              <button type="button" class="js-delete-sub-img-btn interaction-form__submit-btn--update">
                Xóa ảnh đã chọn
              </button>
            </div>
            <input type="file" class="js-multiple-img-input interaction-form__input--hidden" 
              id="product_variant_sub_img_list_'.$color_id.'"
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
              '.$product_variant_row.'
            </ul>
            <button type="button" class="interaction-form__sub-variant-add-btn js-add-sub-variant-btn">
              Thêm kích cỡ
            </button>
          </div>
          <div class="interaction-form__action-group">
            <input type="hidden" name="object_id" value="'.$product_id.'">
            <input type="hidden" name="product_variant_color_id" value="'.$color_id.'">
            <button type="submit" class="interaction-form__submit-btn--update"
              name="update_variant_confirm" 
              value="true"
            >
              Sửa biến thể
            </button>
            <button type="submit" class="interaction-form__submit-btn--delete"
              name="delete_variant_confirm" 
              value="true"
            >
              Xóa biến thể
            </button>
          </div>
          <label for="interaction-form__collapse-product-form"
            class="js-collapse-all-variant-form interaction-form__submit-btn--add-full">
            Sửa sản phẩm
          </label>
        </form>
      ';
    }
  ?>
  
  
</section>

<section class="notification">
  <span class="notification__title">Thông báo: </span>
  <span class="notification__content">
    <?php echo $notification; ?>
  </span>
</section>