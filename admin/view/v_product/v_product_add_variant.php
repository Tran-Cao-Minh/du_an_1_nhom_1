<section class="interaction-form">
  <form method="POST" enctype="multipart/form-data">
    <div class="interaction-form__title--add">
      Thêm biến thể sản phẩm
    </div>
    <?php if($product_data != ''): ?>
      <input type="hidden" 
        name="product_id"
        value="<?php echo $product_data['PkProduct_Id']; ?>"
      >
      <div class="interaction-form__form-group">
        <div class="interaction-form__form-title">
          Tên sản phẩm
        </div>
        <input type="text" class="interaction-form__input--read-only"
          readonly
          value="<?php echo $product_data['ProductName']; ?>"
        >
      </div>
      <div class="interaction-form__form-group">
        <div class="interaction-form__form-title">
          Danh mục
        </div>
        <input type="text" class="interaction-form__input--read-only"
          readonly
          value="<?php echo $product_type['TypeName']; ?>"
        >
      </div>
      <div class="interaction-form__form-group">
        <div class="interaction-form__form-title">
          Thương hiệu
        </div>
        <input type="text" class="interaction-form__input--read-only"
          readonly
          value="<?php echo $product_brand['BrandName']; ?>"
        >
      </div>
      <div class="interaction-form__form-group">
        <div class="interaction-form__form-title">
          Màu sắc
        </div>
        <div class="interaction-form__color-group">
          <?php
            if ($productChoosenColorList != '') {
              foreach ($productChoosenColorList as $color) {
                echo '
                  <div class="interaction-form__color-item--choosen"
                    title="Đã có biến thể với màu '.$color['ColorName'].'">
                    <div class="interaction-form__color-icon--choosen"
                      style="--bg-color:#'.$color['PkColor_Id'].';">
                      <i class="fas fa-check interaction-form__color-icon--choosen-icon"></i>
                    </div>
                  </div>
                ';
              }
            }
            if ($productNotChoosenColorList != '') {
              for ($i = 0; $i < count($productNotChoosenColorList); $i++) {
                $color = $productNotChoosenColorList[$i];
                if ($i == 0) {
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
                } else {
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
                }
              }
            }
            echo '
              <a
                href="?page_name=manage_color&view_name=add&previous_page=add_product_variant&object_id='.$object_id.'"
                class="interaction-form__color-item--add-btn" title="Thêm màu sắc">
                <div class="interaction-form__color-icon--contain-add-icon">
                  <i class="fas fa-plus interaction-form__color-icon--add-icon"></i>
                </div>
              </a>
            ';
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
    <?php else: ?>
      <div class="interaction-form__form-group">
        <div class="interaction-form__form-title">
          Thông báo
        </div>
        <input type="text" class="interaction-form__input--read-only"
          readonly
          value="Phải tồn tại sản phẩm để thêm biến thể tương ứng"
        >
      </div>
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