<section class="product">
  <input type="checkbox" name="" id="toggle__filter">
  <div class="product__filter">
    <div class="product__filter-icon-close">
      <label for="toggle__filter" class="product__filter-icon-close-btn">
        <i class="fas fa-times header__menu-mobile-close-btn-icon"></i>
      </label>
    </div>
    <div class="product__filter-action">
      <button class="js-delete-filter-btn product__filter-action-clear">
        Xóa tất cả
      </button>
      <label class="product__filter-action-apply" for="toggle__filter">
        Chấp nhận
      </label>
    </div>
    <!-- Start filter column -->
    <div class="product__filter-column">
      <label class="label__head" for="sort"> <span class="label__head-name">Sắp xếp</span>
        <label class="plus-icon" for="sort">
          <i><i class="fas fa-plus"></i></i>
        </label>
      </label>
      <input class="filter-toggle" type="checkbox" name="" id="sort">
      <div class="product__filter-content">
        <label class="product__filter-item">
          <input class="js-order-input" 
            value="Mới nhất" checked
            type="radio" id="newest" name="filter__sort">
          <label class=" product__filter-label__radio" for="newest">
            <span class="filter-name">
              Mới nhất
            </span>
          </label>
        </label>
        <label class="product__filter-item">
          <input class="js-order-input" 
            value="Nổi bật nhất"
            type="radio" id="most" name="filter__sort">
          <label class=" product__filter-label__radio" for="most">
            <span class="filter-name">
              Nổi bật nhất
            </span>
          </label>
        </label>
        <label class="product__filter-item">
          <input class="js-order-input" 
            value="Giá giảm dần"
            type="radio" id="priceDown" name="filter__sort">
          <label class=" product__filter-label__radio" for="priceDown">
            <span class="filter-name">
              Giá giảm dần
            </span>
          </label>
        </label>
        <label class="product__filter-item">
          <input class="js-order-input" 
            value="Giá tăng dần"
            type="radio" id="priceUp" name="filter__sort">
          <label class=" product__filter-label__radio" for="priceUp">
            <span class="filter-name">
              Giá tăng dần
            </span>
          </label>
        </label>
      </div>
    </div>
    <!-- End filter column -->
    <!-- Start filter column -->
    <div class="product__filter-column">
      <label class="label__head" for="price"> <span class="label__head-name">Mức giá</span>
        <label class="plus-icon" for="price">
          <i><i class="fas fa-plus"></i></i>
        </label>
      </label>
      <input class="filter-toggle" type="checkbox" name="" id="price">
      <div class="product__filter-content">
        <label class="product__filter-item">
          <input class="js-price-range-input"
            value="Dưới 1 triệu" 
            type="radio" id="below1m" name="filter__price">
          <label class=" product__filter-label__radio" for="below1m">
            <span class="filter-name">
              Dưới 1 triệu
            </span>
          </label>
        </label>
        <label class="product__filter-item">
          <input class="js-price-range-input"
            value="Từ 1 đến 2 triệu" 
            type="radio" id="1mTo2m" name="filter__price">
          <label class=" product__filter-label__radio" for="1mTo2m">
            <span class="filter-name">
              Từ 1 đến 2 triệu
            </span>
          </label>
        </label>
        <label class="product__filter-item">
          <input class="js-price-range-input"
            value="Từ 2 đến 3 triệu" 
            type="radio" id="2mTo3m" name="filter__price">
          <label class=" product__filter-label__radio" for="2mTo3m">
            <span class="filter-name">
              Từ 2 đến 3 triệu
            </span>
          </label>
        </label>
        <label class="product__filter-item">
          <input class="js-price-range-input"
            value="Trên 3 triệu" 
            type="radio" id="over3m" name="filter__price">
          <label class=" product__filter-label__radio" for="over3m">
            <span class="filter-name">
              Trên 3 triệu
            </span>
          </label>
        </label>
      </div>
    </div>
    <!-- End filter column -->
    <!-- Start filter column -->
    <!-- <div class="product__filter-column">
      <label class="label__head" for="sex"> <span class="label__head-name">Giới tính</span>
        <label class="plus-icon" for="sex">
          <i><i class="fas fa-plus"></i></i>
        </label>
      </label>
      <input class="filter-toggle" type="checkbox" name="" id="sex">
      <div class="product__filter-content">
        <div class="product__filter-item">
          <input type="checkbox" id="male">
          <label class="product__filter-label" for="male"><span class="filter-name">Nam</span></label>
        </div>
        <div class="product__filter-item">
          <input type="checkbox" id="female">
          <label class="product__filter-label" for="female"><span class="filter-name">Nữ</span></label>
        </div>
        <div class="product__filter-item">
          <input type="checkbox" id="lgbt">
          <label class="product__filter-label" for="lgbt"><span class="filter-name">Trung
              Tính</span></label>
        </div>
      </div>
    </div> -->
    <!-- End filter column -->
    <!-- Start filter column -->
    <!-- <div class="product__filter-column">
      <label class="label__head" for="age"><span class="label__head-name">Độ tuổi</span>
        <label for="age" class="plus-icon">
          <i><i class="fas fa-plus"></i></i>
        </label>
      </label>
      <input class="filter-toggle" type="checkbox" name="" id="age">
      <div class="product__filter-content">
        <div class="product__filter-item">
          <input type="checkbox" id="adults">
          <label class="product__filter-label" for="adults"><span class="filter-name">Ngưới
              lớn</span></label>
        </div>
        <div class="product__filter-item">
          <input type="checkbox" id="childen">
          <label class="product__filter-label" for="childen"><span class="filter-name">Trẻ
              em</span></label>
        </div>
      </div>
    </div> -->
    <!-- End filter column -->
    <!-- Start filter column -->
    <div class="product__filter-column">
      <label class="label__head" for="brand">
        <span class="label__head-name"> Thương hiệu</span>
        <label for="brand" class="plus-icon">
          <i class="fas fa-plus"></i>
        </label>
      </label>
      <input class="filter-toggle" type="checkbox" name="" id="brand">
      <div class="product__filter-content">
        <?php 
          foreach ($product_brand_list as $brand) {
            echo '
              <label class="product__filter-item">
                <input type="checkbox" 
                  class="js-filter-label-input js-brand-input"
                  id="'.$brand['PkBrand_Id'].$brand['BrandName'].'"
                  value="Nhãn hiệu: '.$brand['BrandName'].'"
                  data-filter-value="'.$brand['PkBrand_Id'].'"
                >
                <label class="product__filter-label" for="'.$brand['PkBrand_Id'].$brand['BrandName'].'">
                  <span class="filter-name">
                    '.$brand['BrandName'].'
                  </span>
                </label>
              </label>
            ';
          }
        ?>
      </div>
    </div>
    <!-- End filter column -->
    <!-- Start filter column -->
    <div class="product__filter-column">
      <label class="label__head" for="colors"><span class="label__head-name">Màu sắc</span>
        <label for="colors" class="plus-icon">
          <i><i class="fas fa-plus"></i></i>
        </label>
      </label>
      <input class="filter-toggle" type="checkbox" name="" id="colors">
      <div class="product__filter-content product__filter-content--color">
        <?php 
          foreach ($product_color_list as $color) {
            echo '
              <label 
                title="'.$color['ColorName'].'"
                for="'.$color['PkColor_Id'].$color['ColorName'].'" 
                class="product__filter-item-color"
              >
                <input type="checkbox" 
                  class="js-filter-label-input js-color-input"
                  id="'.$color['PkColor_Id'].$color['ColorName'].'"
                  value="Màu sắc: '.$color['ColorName'].'"
                  data-filter-value="'.$color['PkColor_Id'].'"
                >
                <div class="product__filter-label--circle"  
                  style="--bg-color: #'.$color['PkColor_Id'].';"
                >
                </div>
              </label>
            ';
          }
        ?>
      </div>
    </div>
    <!-- End filter column -->
    <!-- Start filter column -->
    <div class="product__filter-column">
      <label class="label__head" for="sizes"><span class="label__head-name">Kích cỡ</span>
        <label for="sizes" class="plus-icon">
          <i><i class="fas fa-plus"></i></i>
        </label>
      </label>
      <input class="filter-toggle" type="checkbox" name="" id="sizes">
      <div class="product__filter-content product__filter-content-size">
        <?php 
          foreach ($product_size_list as $size) {
            echo '
              <label class="product__filter-item">
                <input type="checkbox" 
                  class="js-filter-label-input js-size-input"
                  id="'.$size['ProductSize'].'"
                  value="Kích cỡ: '.$size['ProductSize'].'"
                  data-filter-value="'.$size['ProductSize'].'"
                >
                <div class="product__filter-label-size" for="'.$size['ProductSize'].'">
                  <span class="prodduct__size-name">
                    '.$size['ProductSize'].'
                  </span>
                </div>
              </label>
            ';
          }
        ?>
      </div>
    </div>
    <!-- End filter column -->
  </div>
  <div class="product__area">
    <!-- Start product area -->
    <div class="product__area-top">
      <label class="filter-menu" for="toggle__filter">
        <label for="toggle__filter" class="filter-menu__icon"><i class="fas fa-bars"></i></label>
      </label>
      <ul class="product-bar">
        <?php 
          if (isset($_GET['category'])) {
            $category_id = $_GET['category'];
          } else {
            $category_id = '';
            echo '
              <script type="text/javascript">
                sessionStorage.setItem("categoryList", JSON.stringify([]));
              </script>
            ';
          }
          foreach ($product_category_list as $category) {
            if ($category['PkType_Id'] != $category_id) {
              echo '
                <li class="product-bar__item">
                  <input type="checkbox" 
                    class="js-category-input"
                    id="'.$category['PkType_Id'].$category['TypeName'].'"
                    data-filter-value="'.$category['PkType_Id'].'"
                  >
                  <label for="'.$category['PkType_Id'].$category['TypeName'].'" class="product-bar__label">
                    '.$category['TypeName'].'
                  </label>
                </li>
              ';
            } else {
              echo '
                <li class="product-bar__item">
                  <input checked type="checkbox" 
                    class="js-category-input"
                    id="'.$category['TypeName'].'"
                    data-filter-value="'.$category['PkType_Id'].'"
                  >
                  <label for="'.$category['TypeName'].'" class="product-bar__label">
                    '.$category['TypeName'].'
                  </label>
                </li>
              ';
              echo '
                <script type="text/javascript">
                  sessionStorage.setItem("categoryList", JSON.stringify(["'.$category['PkType_Id'].'"]));
                </script>
              ';
            }
          }
        ?>
      </ul>
    </div>
    <!-- End section top -->
    <!-- Start product__breadcrumb -->
    <ul class="product__breadcrumb">
      <li class="product__breadcrumb__item">
        <label class="product__breadcrumb__item-label">
          Sắp xếp: &nbsp;
          <span class="js-order-label-content">
            Mới nhất
          </span>
        </label>
      </li>
      <li class="product__breadcrumb__item js-price-range-label" style="display: none;">
        <label class="product__breadcrumb__item-label">
          Mức giá: &nbsp;
          <span class="js-price-range-label-content">
          </span>
          <div class="product__breadcrumb__item--icon-close">
            <i class="fas fa-times"></i>
          </div>
        </label>
      </li>
      <div class="js-product-filter-label-container">
        <!-- add label by create_label.js -->
      </div>
      <div class="product__breadcrumb__btn js-delete-filter-btn">
        <button>XOÁ BỘ LỌC</button>
      </div>
    </ul>
    <!-- End product__breadcrumb -->
    <!-- Start product section -->
    <div class="product__section js-product-container">
      <!-- 
        add product list by getProductList function 
        send_product_request.js and send_general_request.js 
      -->
    </div>
  </div>
  <!-- End  product area -->

</section>