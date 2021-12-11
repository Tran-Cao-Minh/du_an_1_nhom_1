<div class="overlay-5">
  <section class="form">
    <form action="" class="form__product"> 
      <div class="form__product__variant">
        <!-- Start variant color -->
        <div class="form__product__variant__color js-click">
          <div class="form__product__variant__top">
            <p>Màu sắc</p>
          </div>
          <div class="js-buy-product-form-variant form__product__variant__bottom">
            <!-- add color and data by send_product_request.js -->
          </div>
        </div>
        <!-- End variant color -->
        <!-- Start variant size -->
        <div class="form__product__variant__size">
          <div class="form__product__variant__top">
            <p>Kích cỡ</p>
          </div>
          <div class="js-buy-product-form-size product__filter-content-size form__product__variant__bottom">
            <!-- add size by buy_product_form_interaction.js -->
          </div>
        </div>
        <!-- End variant size -->
      </div>
      <div class="form__product__action">
        <div class="form__product__action__top">
          <button 
            data-product-id=""
            type="button" 
            class="btn__add js-buy-product-form-add">
            Thêm vào giỏ
          </button>
          <button type="submit" class="btn__pay">
            Thanh toán
          </button>
        </div>
        <div class="js-buy-product-form-notification">
          <!-- Không thế thêm sản phẩm vào giỏ hàng do sản phẩm đã vượt quá số lượng tối đa có trong kho là: "5" -->
        </div>
        <div class="form__product__action__bottom">
          <button type="submit" class="btn__detail">
            Chi tiết sản phẩm
          </button>
        </div>
      </div>
    </form>
    <div class="form__close js-close-buy-prod-btn">
      <span class="form__close__icon">
        <i class="fas fa-times"></i> 
      </span>
    </div>
  </section>
</div>