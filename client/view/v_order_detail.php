<section class="order__detail">
  <div class="tittle__bar">
    <div class="tittle__bar-name">
      Tổng quan
    </div>
    <button class="top-bar__tile-bar-my-shopping-cart">
      Đơn hàng của tôi
      <i class="fas fa-address-card my-shopping-cart__icon"></i>
    </button>
  </div>
  <div class="order__detail-info">
    <div class="order__detail-info-article">
      <div class="order__detail-info-date-created">
        <p>Ngày tạo</p>
        <p>
          <?php echo $order_data['OrderDate']; ?>
        </p>
      </div>
      <div class="order__detail-info-status">
        <div class="order__detail-info-status-name">
          Trạng thái
        </div>
        <button class="order__detail-info-status-btn">
          <?php 
            switch ($order_data['FkOrderStatus_Id']) {
              case '0':
                echo 'Đang xử lý';
              case '1':
                echo 'Đang giao hàng';
              case '2':
                echo 'Hoàn tất';      
              case '3':
                echo 'Bị hủy';  
            }
          ?>
          <!-- <i class="fas fa-user-check order__detail-info-status-icon"></i> -->
        </button>
      </div>
      <div class="order__detail-info-note-name">
        Ghi chú
      </div>
      <div class="order__detail-info-note-area">
        <textarea readonly><?php echo $order_data['OrderNote']; ?></textarea>
      </div>
      <div class="payment__info-result">
        <!-- <div class="payment__info-result-1 payment__info-result-0">
          <p class="payment__info-result-name">Phí vận chuyển</p>
          <p class="payment__info-result-price">50.000 đ</p>
        </div> -->
        <!-- <div class="payment__info-result-2 payment__info-result-0">
          <p class="payment__info-result-name">Tổng tiền</p>
          <p class="payment__info-result-price">2.535.000 đ</p>
        </div> -->
        <!-- <div class="payment__info-result-3 payment__info-result-0">
          <p class="payment__info-result-name">Giảm giá</p>
          <p class="payment__info-result-price">20.000 đ</p>
        </div> -->
        <div class="payment__info-result-4 payment__info-result-0">
          <p class="payment__info-result-name--18">Tổng tiền</p>
          <p class="payment__info-result-price"><?php echo number_format($order_data['OrderTotalMoney'], 0, ',', '.'); ?> đ</p>
        </div>
      </div>
    </div>
    <div class="order__detail-info-aside">
      <div class="payment__info-method">
        <div class="payment__info-method-choose">
          <div class="payment__info-method-head">
            Phương thức thanh toán
          </div>
          <div class="payment__info-method-body">
            <div class="payment__info-method-item">
              <input type="radio" checked>
              <label class="payment__info-method-label">Trực tiếp</label>
            </div>
          </div>
        </div>
        <div class="payment__info-method-delivery">
          <div class="payment__info-method-head">
            Đơn vị giao hàng
          </div>
          <div class="payment__info-method-item">
            <input type="radio" checked>
            <label class="payment__info-method-label">Viettel Post</label>
          </div>
        </div>
      </div>
      <div class="order__detail-info-user">
        <div class="payment__left-customer-tittle">
          Thông tin người nhận
        </div>
        <div class="payment__left-customer-form">
          <div class="form__group">
            <label class="form__label" for="">Họ và tên</label>
            <input class="form__input form__input--primary" type="text" 
              readonly
              value="<?php echo $order_data['CustomerName']; ?>" 
            />
          </div>
          <div class="form__group">
            <label class="form__label" for="">Số điện thoại</label>
            <input class="form__input form__input--primary" type="text" 
              readonly
              value="<?php echo $order_data['CustomerPhone']; ?>" 
            />
          </div>
          <div class="form__group">
            <label class="form__label" for="">Địa chỉ</label>
            <input class="form__input form__input--primary" type="text" 
              readonly
              value="<?php echo $order_data['CustomerAddress']; ?>" 
            />
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="order__detail-delivery-box">
    <div class="tittle__bar">
      <div class="tittle__bar-name">
        Lịch sử giao hàng
      </div>
    </div>
    <div class="order__delivery-item">
      <div class="order__delivery-item-top">
        <p>19/10/2021 - 08:51</p>
      </div>
      <div class="order__delivery-item-body">
        Chấp nhận gửi (Posting / Collection ) (813920: Xuân Tâm - Đồng Nai ) (Đầu mối CSKH: 02513.850.599 )
        <span class="order__detail-delivering">
          Ấp 2, Xã Xuân Tâm, Xuân Lộc, Đồng Nai
        </span>
      </div>
    </div>
    <div class="order__delivery-item">
      <div class="order__delivery-item-top">
        <p>19/10/2021 - 09:44</p>
      </div>
      <div class="order__delivery-item-body">
        Đi khỏi bưu cục (Departure from PO) (813920: Xuân Tâm - Đồng Nai )
        <span class="order__detail-ready">
          Ấp 2, Xã Xuân Tâm, Xuân Lộc, Đồng Nai
        </span>
      </div>

    </div>
    <div class="order__delivery-item">
      <div class="order__delivery-item-top">
        <p>19/10/2021 - 10:34</p>
      </div>
      <div class="order__delivery-item-body">
        Đã vận chuyển đi khỏi bưu cục (Transport departure from PO) (813920: Xuân Tâm - Đồng Nai )
        <span class="order__detail-delivering">
          Ấp 2, Xã Xuân Tâm, Xuân Lộc, Đồng Nai
        </span>
      </div>

    </div>
    <div class="order__delivery-item">
      <div class="order__delivery-item-top">
        <p>20/10/2021 - 15:16</p>
      </div>
      <div class="order__delivery-item-body">
        Phát thành công (Delivered) (725231: BCP EMS Phú Nhuận - Hồ Chí Minh )
        <span class="order__detail-delivering">
          Sô´251/7, Đường Nguyễn Văn Trổi, Phường Số 10, Phú Nhuận, Hồ Chí Minh
        </span>
      </div>

    </div>
  </div> -->
  <div class="order__detail-prod">
    <div class="tittle__bar">
      <div class="tittle__bar-name">
        Chi tiết sản phẩm
      </div>
    </div>
  </div>
  <div class="cart__prod">
    <?php
      foreach ($product_list as $row) {
        echo '
          <div class="cart__prod-item">
            <div class="cart__prod-item-image">
              <img src="../public/image/product/'.$row['ImageFileName'].'">
            </div>
            <div class="cart__prod-item-info">
              <div class="cart__prod-item-info-name">
                '.$row['ProductName'].'
              </div>
              <div class="cart__prod-item-info-variant">
                <label class="cart__prod-item-info-variant-color" 
                  style="--bg-color: #'.$row['FkColor_Id'].';"
                >
                </label>
                <div class="cart__prod-item-info-variant-size">
                  '.$row['ProductSize'].'
                </div>
                <div class="cart__prod-item-info-variant-price">
                  '.number_format($row['ProductPrice'], 0, ',', '.').' đ
                </div>
              </div>
              <div class="cart__prod-item-quantity">
                Số lượng: 
                <span class="cart__prod-item-quantity-number">
                  '.$row['OrderQuantity'].'
                </span>
              </div>
            </div>
          </div>
        ';
      };
    ?>
  </div>
</section>