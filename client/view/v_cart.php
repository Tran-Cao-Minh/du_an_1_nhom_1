<section class="cart">
  <div class="tittle__bar">
    <div class="tittle__bar-name">
      Tổng quan
    </div>
    <?php if ($check_login == true): ?>
      <a href="?page=order_list">
        <button class="top-bar__tile-bar-my-shopping-cart">
          Đơn hàng của tôi
          <i class="fas fa-address-card my-shopping-cart__icon"></i>
        </button>
      </a>
    <?php endif; ?>
  </div>
  <div class="js-show-sum-basket cart__total">
    <div class="cart__total-top">
      <p>Tổng tiền</p>
      <p class="js-sum-basket cart__total-top-price">
        3.069.000 đ
      </p>
    </div>
    <div class="cart__total-desc">
      Tổng số tiền đã bao gồm VAT
    </div>
    <div class="cart__total-action">
      <a href="?page=product">
        <button class="cart__total-action-update">
          Thêm sản phẩm
        </button>
      </a>
      <a href="?page=pay">
        <button class="cart__total-action-pay">
          Thanh toán
        </button>
      </a>
    </div>
  </div>
  <div class="js-basket-empty-notification-cart-page cart__empty">
    <i class="cart__empty-icon far fa-laugh-beam"></i>
    Chưa có sản phẩm nào trong giỏ hàng của bạn ~
    <a href="?page=product" class="cart__go-to-product-page">
      Tiếp tục mua sắm
    </a>
  </div>
  <div class="js-detail-product-title tittle__bar">
    <div class="tittle__bar-name">
      Chi tiết
    </div>
  </div>
  <div class="js-contain-basket-product-cart-page cart__prod">
    <!-- add product item by js -->
  </div>
</section>