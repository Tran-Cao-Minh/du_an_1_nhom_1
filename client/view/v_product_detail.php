<section class="prod__detail">
  <div class="prod__detail-wrapper">
    <div class="prod__detail-left">
      <div class="prod__detail-image">
        <div class="prod__detail-image">
          <img class="js-product-main-img" 
            src="../public/image/site/product/productMainImg.png" 
            data-image="">
          <!-- <input type="checkbox" name="" id="heart__icon">
                    <label for="heart__icon" class="heart__icon">
                    </label> -->
        </div>
        <ul class="js-contain-img-list prod__detail-other">
          <!-- add img by change_data_by_color.js -->
          <!-- <span class="prev__icon">
            <i class="fas fa-chevron-left"></i>
          </span>
          <span class="next__icon">
            <i class="fas fa-chevron-right"></i>
          </span> -->
        </ul>
      </div>
    </div>
    <div class="prod__detail-right">
      <div class="prod__detail-info">
        <div class="js-product-name prod__detail-info-name">
          <?php echo $product_data['ProductName']; ?>
        </div>
        <ul class="prod__detail-info-tag">
          <li class="prod__detail-info-tag-name">
            Thương hiệu - <?php echo $product_data['BrandName']; ?>
          </li>
          <li class="prod__detail-info-tag-name">
            <?php echo $product_data['TypeName']; ?>
          </li>
          <!-- <li class="prod__detail-info-tag-name">Nam</li> -->
          <!-- <li class="prod__detail-info-tag-name">Người lớn</li> -->
          <div class="prod__detail-info-view-quantity">
            <span class="prod__detail-info-view-quantity-icon"><i class="far fa-eye"></i></span>
            <p class="prod__detail-info-view-quantity-text">
              <?php echo number_format($product_data['ProductView'], 0, ',', '.'); ?>
            </p>
          </div>
        </ul>
        <div class="prod__detail-info-overview">
          <!-- <div class="prod__detail-info-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                         Xem 257 đánh giá 
                    </div> -->
          <!-- <div class="prod__detail-info-view-quantity">
            <span class="prod__detail-info-view-quantity-icon"><i class="far fa-eye"></i></span>
            <p class="prod__detail-info-view-quantity-text">1.6903</p>
          </div> -->
        </div>
      </div>
      <div class="prod__detail-form">
        <!-- Start variant color -->
        <div class="form__product__variant__color">
          <div class="form__product__variant__top">
            <p>Màu sắc</p>
          </div>
          <div class="form__product__variant__bottom">
            <?php
              // create input color with data
              $prev_product_variant_color = '';
              $prev_product_variant_size = '';
              $prev_product_variant_amount = '';
              $output = '';
              foreach ($product_variant_list as $product_variant) {
                if ($prev_product_variant_color != $product_variant['FkColor_Id']) {
                  if ($prev_product_variant_color != '') {
                    $prev_product_variant_size = substr($prev_product_variant_size, 0, -1);
                    $prev_product_variant_amount = substr($prev_product_variant_amount, 0, -1);
                    $output .= '
                      <label class="product__filter-item-color">
                        <input type="radio" 
                          class="js-get-product-variant-color"
                          name="product_variant_color"
                          id="product_variant_'.$prev_product_variant_color.'"
                          data-size="'.$prev_product_variant_size.'"
                          data-quantity="'.$prev_product_variant_amount.'"
                          data-color-id="'.$prev_product_variant_color.'"
                          data-image=""
                        >
                        <label class="product__filter-label--circle" 
                          for="product_variant_'.$prev_product_variant_color.'" 
                          style="--bg-color: #'.$prev_product_variant_color.';"
                        >
                        </label>
                      </label>
                    ';
                  }
                  $prev_product_variant_color = $product_variant['FkColor_Id'];
                  $prev_product_variant_size = $product_variant['ProductSize'].' ';
                  $prev_product_variant_amount = $product_variant['ProductQuantity'].' ';
                } else {
                  $prev_product_variant_size .= $product_variant['ProductSize'].' ';
                  $prev_product_variant_amount .= $product_variant['ProductQuantity'].' ';
                }
              }

              // add last product variant into container
              $prev_product_variant_size = substr($prev_product_variant_size, 0, -1);
              $prev_product_variant_amount = substr($prev_product_variant_amount, 0, -1);
              $output .= '
                <label class="product__filter-item-color">
                  <input type="radio" 
                    class="js-get-product-variant-color"
                    name="product_variant_color"
                    id="product_variant_'.$prev_product_variant_color.'"
                    data-size="'.$prev_product_variant_size.'"
                    data-quantity="'.$prev_product_variant_amount.'"
                    data-color-id="'.$prev_product_variant_color.'"
                    data-image=""
                  >
                  <label class="product__filter-label--circle" 
                    for="product_variant_'.$prev_product_variant_color.'" 
                    style="--bg-color: #'.$prev_product_variant_color.';"
                  >
                  </label>
                </label>
              ';
              echo $output;
            ?>
            <?php
              // add image data to input color
              $prev_product_image_color = '';
              $prev_product_image_file = '';
              $output = '
                <script type="text/javascript">
                  let colorInput;
              ';
              foreach ($product_image_list as $product_image) {
                if ($prev_product_image_color != $product_image['FkColor_Id']) {
                  if ($prev_product_image_color != '') {
                    $prev_product_image_file = substr($prev_product_image_file, 0, -1);
                    $output .= '
                      colorInput = document.getElementById("product_variant_'.$prev_product_image_color.'");
                      colorInput.dataset.image = "'.$prev_product_image_file.'";
                    ';
                  }
                  $prev_product_image_color = $product_image['FkColor_Id'];
                  $prev_product_image_file = $product_image['ImageFileName'].' ';
                } else {
                  $prev_product_image_file .= $product_image['ImageFileName'].' ';
                }
              }
              // add last color data image to last input color
              $prev_product_image_file = substr($prev_product_image_file, 0, -1);
              $output .= '
                colorInput = document.getElementById("product_variant_'.$prev_product_image_color.'");
                colorInput.dataset.image = "'.$prev_product_image_file.'";
              ';
              echo $output.'</script>';
            ?>
          </div>
        </div>
        <!-- End variant color -->
        <!-- Start variant size -->
        <div class="form__product__variant__size">
          <div class="form__product__variant__top">
            <p>Kích cỡ</p>
          </div>
          <div class="js-contain-product-size product__filter-content-size form__product__variant__bottom">
            <!-- add size by change_data_by_color.js -->
          </div>
        </div>
        <!-- End variant size -->
      </div>
      <div class="prod__detail-inventory">
        <div class="product__choose-number">
          Số lượng
          <div class="js-sub-product-quantity product__choose-number-decrease">
            <i class="fas fa-minus"></i>
          </div>
          <input type="number" value="1" 
            class="js-product-quantity product__choose-number-count"
          >
          </input>
          <div class="js-add-product-quantity product__choose-number-increase">
            <i class="fas fa-plus"></i>
          </div>
        </div>
        <div class="prod__detail-inventory-remain">
          Còn lại 
          <span class="js-remain-product-quantiy">?</span> 
          sản phẩm
        </div>
      </div>
      <div class="prod__detail-price">
        <div class="js-product-price prod__detail-price-new"
          data-price="<?php echo $product_data['ProductPrice']; ?>"
        >
          <?php echo number_format($product_data['ProductPrice'], 0, ',', '.'); ?> đ
        </div>
        <div class="prod__detail-price-sale">
          <?php echo $product_data['ProductDiscount']; ?>%
        </div>
        <div class="prod__detail-price-old">
          <small>
            <?php
              $old_price = ($product_data['ProductPrice'] / (100 - $product_data['ProductDiscount']));
              $old_price = ceil($old_price) * 100;
              echo number_format($old_price, 0, ',', '.');
            ?>
          </small> đ
        </div>
      </div>
      <div class="prod__detail-action">
        <button type="button" class="js-buy-product-add btn btn__add" 
          data-id="<?php echo $product_id; ?>"
        >
          Thêm vào giỏ
        </button>
        <button type="button" class="btn btn__buy">
          Mua ngay
        </button>
      </div>
      <div class="js-buy-product-notification">
        Bạn không thể thêm sản phẩm vào giỏ hàng do số lượng sản phẩm sau khi thêm vượt quá số lượng tối đa la "6"
      </div>
    </div>
  </div>
  <!-- <div class="prod__detail-similar-tittle tittle__bar">
        SẢN PHẨM TƯƠNG TỰ
    </div>
    <div class="prod__detail-similar">
        <div class="prod__detail-similar-prod">
            <div class="product__column">
                <div class="product__image">
                    <a href=""> <img src="../public/image/site/product/prodImg (1).png" alt=""></a>
                </div>
                <div class="product__info">
                    <div class="product__variant">
                        <div class="product__variant__item">
                            <input type="checkbox" name="" id="">
                            <label style="--bg-color:#EE6F57" for="" class="product__variant--color"></label>
                        </div>
                        <div class="product__variant__item">
                            <input type="checkbox" name="" id="">
                            <label style="--bg-color:#51C4D3" for="" class="product__variant--color"></label>
                        </div>
                    </div>
                    <div class="product__name">
                        <p>Nike Air Zoom Pegasus 38</p>
                    </div>
                    <div class="product__price">
                        <div class="product__price--new">
                            4.109.000 đ
                        </div>
                        <div class="product__price--old">
                            <span> 4.509.000</span> <small>đ</small>
                        </div>
                    </div>
                </div>
                <div class="product__button">
                    <button type="submit">Mua Hàng</button>
                </div>
            </div>
            <div class="product__column">
                <div class="product__image">
                    <a href=""> <img src="../public/image/site/product/prodImg (1).png" alt=""></a>
                </div>
                <div class="product__info">
                    <div class="product__variant">
                        <div class="product__variant__item">
                            <input type="checkbox" name="" id="">
                            <label style="--bg-color:#EE6F57" for="" class="product__variant--color"></label>
                        </div>
                        <div class="product__variant__item">
                            <input type="checkbox" name="" id="">
                            <label style="--bg-color:#51C4D3" for="" class="product__variant--color"></label>
                        </div>
                    </div>
                    <div class="product__name">
                        <p>Nike Air Zoom Pegasus 38</p>
                    </div>
                    <div class="product__price">
                        <div class="product__price--new">
                            4.109.000 đ
                        </div>
                        <div class="product__price--old">
                            <span> 4.509.000</span> <small>đ</small>
                        </div>
                    </div>
                </div>
                <div class="product__button">
                    <button type="submit">Mua Hàng</button>
                </div>
            </div>
            <div class="product__column">
                <div class="product__image">
                    <a href=""> <img src="../public/image/site/product/prodImg (1).png" alt=""></a>
                </div>
                <div class="product__info">
                    <div class="product__variant">
                        <div class="product__variant__item">
                            <input type="checkbox" name="" id="">
                            <label style="--bg-color:#EE6F57" for="" class="product__variant--color"></label>
                        </div>
                        <div class="product__variant__item">
                            <input type="checkbox" name="" id="">
                            <label style="--bg-color:#51C4D3" for="" class="product__variant--color"></label>
                        </div>
                    </div>
                    <div class="product__name">
                        <p>Nike Air Zoom Pegasus 38</p>
                    </div>
                    <div class="product__price">
                        <div class="product__price--new">
                            4.109.000 đ
                        </div>
                        <div class="product__price--old">
                            <span> 4.509.000</span> <small>đ</small>
                        </div>
                    </div>
                </div>
                <div class="product__button">
                    <button type="submit">Mua Hàng</button>
                </div>
            </div>
            <div class="product__column">
                <div class="product__image">
                    <a href=""> <img src="../public/image/site/product/prodImg (1).png" alt=""></a>
                </div>
                <div class="product__info">
                    <div class="product__variant">
                        <div class="product__variant__item">
                            <input type="checkbox" name="" id="">
                            <label style="--bg-color:#EE6F57" for="" class="product__variant--color"></label>
                        </div>
                        <div class="product__variant__item">
                            <input type="checkbox" name="" id="">
                            <label style="--bg-color:#51C4D3" for="" class="product__variant--color"></label>
                        </div>
                    </div>
                    <div class="product__name">
                        <p>Nike Air Zoom Pegasus 38</p>
                    </div>
                    <div class="product__price">
                        <div class="product__price--new">
                            4.109.000 đ
                        </div>
                        <div class="product__price--old">
                            <span> 4.509.000</span> <small>đ</small>
                        </div>
                    </div>
                </div>
                <div class="product__button">
                    <button type="submit">Mua Hàng</button>
                </div>
            </div>
            <span class="prev__icon">
                <i class="fas fa-chevron-left"></i>
            </span>
            <span class="next__icon">
                <i class="fas fa-chevron-right"></i>
            </span>
        </div>
    </div> -->
  <div class="prod__detail-comment-tittle tittle__bar">
    ĐÁNH GIÁ - NHẬN XÉT
  </div>
  <div class="prod__detail-comment">
    <div class="prod__detail-comment-form">
      <textarea placeholder="Nhập bình luận của bạn..." class="js-comment-input prod__detail-comment-input"></textarea>
      <span class="prod__detail-comment-form-icon">
        <i class="fas fa-comment-medical"></i>
      </span>
    </div>
    <!-- <div class="prod__detail-comment-overview">
            <div class="prod__detail-comment-rating">
                <p>Đánh giá của bạn</p>
                <form action="">
                    <input class="star star-5" id="star-5" type="radio" name="star" />
                    <label class="star js-prod-star star-5" for="star-5"></label>
                    <input class="star star-4" id="star-4" type="radio" name="star" />
                    <label class="star js-prod-star star-4" for="star-4"></label>
                    <input class="star star-3" id="star-3" type="radio" name="star" />
                    <label class="star js-prod-star star-3" for="star-3"></label>
                    <input class="star star-2" id="star-2" type="radio" name="star" />
                    <label class="star js-prod-star star-2" for="star-2"></label>
                    <input class="star star-1" id="star-1" type="radio" name="star" />
                    <label class="star js-prod-star star-1" for="star-1"></label>
                </form>
                <p> Đã đánh giá </p>
            </div>
            <ul class="prod__detail-comment-order">
                <li class="prod__detail-comment-order-item">Mới nhất</li>
                <label class="prod__detail-comment-order-icon">
                    <i class="fas fa-sort"></i>
                </label>
                <ul class="prod__detail-comment-order-contain">
                    <li class="prod__detail-comment-order-contain-item">
                        Cũ nhất
                    </li>
                    <li class="prod__detail-comment-order-contain-item">
                        5 Sao
                    </li>
                    <li class="prod__detail-comment-order-contain-item">
                        4 Sao
                    </li>
                    <li class="prod__detail-comment-order-contain-item">
                        3 Sao
                    </li>
                    <li class="prod__detail-comment-order-contain-item">
                        2 Sao
                    </li>
                </ul>
            </ul>
        </div> -->
    <div class="prod__detail-comment-content">
      <div class="prod__detail-comment-content-item">
        <div class="prod__detail-comment-content-item-heading">
          <div class="prod__detail-comment-content-item-heading-user">
            <div class="prod__detail-comment-content-item-heading-user-img">
              <img src="../public/image/site/home_page/girl.jpg" alt="">
            </div>
            <div class="prod__detail-comment-content-item-heading-user-name">
              <p>Nụ Cười Thần Chết</p>
            </div>
          </div>
          <div class="prod__detail-comment-content-item-heading-user-date">
            21-11-2021
          </div>
        </div>
        <div class="prod__detail-comment-content-item-body">
          Sản phẩm đẹp, chất lượng cao. Giao hàng nhanh chóng, uy tín và rất nhiệt tình. Mong Shop ngày
          càng phát triển.
        </div>
      </div>
      <div class="prod__detail-comment-content-item">
        <div class="prod__detail-comment-content-item-heading">
          <div class="prod__detail-comment-content-item-heading-user">
            <div class="prod__detail-comment-content-item-heading-user-img">
              <img src="../public/image/site/home_page/girl.jpg" alt="">
            </div>
            <div class="prod__detail-comment-content-item-heading-user-name">
              <p>Nụ Cười Thần Chết</p>
              <div class="prod__detail-comment-content-item-heading-user-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
              </div>
            </div>
          </div>
          <div class="prod__detail-comment-content-item-heading-user-date">
            21-11-2021
          </div>
        </div>
        <div class="prod__detail-comment-content-item-body">
          Sản phẩm đẹp, chất lượng cao. Giao hàng nhanh chóng, uy tín và rất nhiệt tình. Mong Shop ngày
          càng phát triển.
        </div>
      </div>
      <div class="prod__detail-comment-content-item">
        <div class="prod__detail-comment-content-item-heading">
          <div class="prod__detail-comment-content-item-heading-user">
            <div class="prod__detail-comment-content-item-heading-user-img">
              <img src="../public/image/site/home_page/girl.jpg" alt="">
            </div>
            <div class="prod__detail-comment-content-item-heading-user-name">
              <p>Nụ Cười Thần Chết</p>
            </div>
          </div>
          <div class="prod__detail-comment-content-item-heading-user-date">
            21-11-2021
          </div>
        </div>
        <div class="prod__detail-comment-content-item-body">
          Sản phẩm đẹp, chất lượng cao. Giao hàng nhanh chóng, uy tín và rất nhiệt tình. Mong Shop ngày
          càng phát triển.
        </div>
      </div>
      <div class="prod__detail-comment-content-item">
        <div class="prod__detail-comment-content-item-heading">
          <div class="prod__detail-comment-content-item-heading-user">
            <div class="prod__detail-comment-content-item-heading-user-img">
              <img src="../public/image/site/home_page/girl.jpg" alt="">
            </div>
            <div class="prod__detail-comment-content-item-heading-user-name">
              <p>Nụ Cười Thần Chết</p>
              <div class="prod__detail-comment-content-item-heading-user-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
              </div>
            </div>
          </div>
          <div class="prod__detail-comment-content-item-heading-user-date">
            21-11-2021
          </div>
        </div>
        <div class="prod__detail-comment-content-item-body">
          Sản phẩm đẹp, chất lượng cao. Giao hàng nhanh chóng, uy tín và rất nhiệt tình. Mong Shop ngày
          càng phát triển.
        </div>
      </div>
      <div class="prod__detail-comment-content-item">
        <div class="prod__detail-comment-content-item-heading">
          <div class="prod__detail-comment-content-item-heading-user">
            <div class="prod__detail-comment-content-item-heading-user-img">
              <img src="../public/image/site/home_page/girl.jpg" alt="">
            </div>
            <div class="prod__detail-comment-content-item-heading-user-name">
              <p>Nụ Cười Thần Chết</p>
              <div class="prod__detail-comment-content-item-heading-user-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
              </div>
            </div>
          </div>
          <div class="prod__detail-comment-content-item-heading-user-date">
            21-11-2021
          </div>
        </div>
        <div class="prod__detail-comment-content-item-body">
          Sản phẩm đẹp, chất lượng cao. Giao hàng nhanh chóng, uy tín và rất nhiệt tình. Mong Shop ngày
          càng phát triển.
        </div>
      </div>
    </div>
    <ul class="product__pagination">
      <li class="product__pagination__link">
        1
      </li>
      <li class="product__pagination__link">
        2
      </li>
      <li class="product__pagination__link--active">
        3
      </li>
      <li class="product__pagination__link">
        4
      </li>
      <li class="product__pagination__link">
        <i class="fas fa-angle-double-right"></i>
      </li>
    </ul>
  </div>
</section>