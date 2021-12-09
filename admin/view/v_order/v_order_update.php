<section class="interaction-form">
  <form>
    <div class="interaction-form__title--update">
      Cập nhật đơn hàng
    </div>
    <?php if ($object_data != ''): ?>
      <div class="interaction-form__form-group">
        <div class="interaction-form__form-title">
          Trạng thái đơn hàng
        </div>
        <select name="order_status_id" class="interaction-form__select-input">
          <?php
            foreach ($order_status_list as $order_status) {
              if ($order_status['PkOrderStatus_Id'] != $object_data['FkOrderStatus_Id']) {
                echo '
                  <option value="'.$order_status['PkOrderStatus_Id'].'" class="interaction-form__select-option">
                    '.$order_status['OrderStatusName'].'
                  </option>
                ';
              } else {
                echo '
                  <option selected value="'.$order_status['PkOrderStatus_Id'].'" class="interaction-form__select-option">
                    '.$order_status['OrderStatusName'].'
                  </option>
                ';
              }
            }
          ?>
        </select>
      </div>
    <?php endif; ?>
    <div class="interaction-form__action-group">
      <input type="hidden" name="object_id" value="<?php echo $object_data['PkOrder_Id']; ?>">
      <button type="submit" class="interaction-form__submit-btn--update"
        name="update_confirm" value="true">
        Xác nhận sửa
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

<?php if ($object_data != ''): ?>
  <section class="interaction-form" style="margin-bottom: 1.5rem;">
    <div class="interaction-form__title--sub" style="margin-top: 0;">
      Thông tin tổng quan
    </div>
    <div class="interaction-form__form-group">
      <div class="interaction-form__form-title">
        Người tạo
      </div>
      <input type="text" class="interaction-form__input--read-only"
        readonly
        value="<?php echo $object_data['CustomerName']; ?>"
      >
    </div>
    <div class="interaction-form__form-group">
      <div class="interaction-form__form-title">
        Ngày tạo
      </div>
      <input type="date" class="interaction-form__input--read-only"
        readonly
        value="<?php echo $object_data['OrderDate']; ?>"
      >
    </div>
    <div class="interaction-form__form-group">
      <div class="interaction-form__form-title">
        Tổng tiền (VND)
      </div>
      <input type="text" class="interaction-form__input--read-only"
        readonly
        value="<?php echo number_format($object_data['OrderTotalMoney'], 0, ',', '.'); ?>"
      >
    </div>
    <div class="interaction-form__form-group">
      <div class="interaction-form__form-title">
        Phương thức thanh toán
      </div>
      <input type="text" class="interaction-form__input--read-only"
        readonly
        value="<?php echo $object_data['OrderPayment']; ?>"
      >
    </div>
    <div class="interaction-form__form-group">
      <div class="interaction-form__form-title">
        Đơn vị giao hàng
      </div>
      <input type="text" class="interaction-form__input--read-only"
        readonly
        value="<?php echo $object_data['OrderShipping']; ?>"
      >
    </div>
    <div class="interaction-form__form-group">
      <div class="interaction-form__form-title">
        Ghi chú
      </div>
      <textarea class="interaction-form__input--read-only paragraph"
        readonly col="2"
      ><?php echo $object_data['OrderNote']; ?></textarea>
    </div>
    <div class="interaction-form__title--sub" style="margin-top: 1.5rem;">
      Thông tin giao hàng
    </div>
    <div class="interaction-form__form-group">
      <div class="interaction-form__form-title">
        Tên người nhận
      </div>
      <input type="text" class="interaction-form__input--read-only"
        readonly
        value="<?php echo $object_data['CustomerName']; ?>"
      >
    </div>
    <div class="interaction-form__form-group">
      <div class="interaction-form__form-title">
        Số điện thoại người nhận
      </div>
      <input type="text" class="interaction-form__input--read-only"
        readonly
        value="<?php echo $object_data['CustomerPhone']; ?>"
      >
    </div>
    <div class="interaction-form__form-group">
      <div class="interaction-form__form-title">
        Địa chỉ giao hàng
      </div>
      <input type="text" class="interaction-form__input--read-only"
        readonly
        value="<?php echo $object_data['CustomerAddress']; ?>"
      >
    </div>
  </section>

  <section class="data-table">
    <div class="data-table__header">
      <div class="data-table__header-title">
        Chi tiết đơn hàng
      </div>
    </div>
    <div class="data-table__body">
      <table class="data-table__table" 
        style="
          --cell-1-width: 28rem; 
          --cell-2-width: 12rem; 
          --cell-3-width: 12rem;
          --cell-4-width: 12rem;
          --cell-5-width: 16rem;
        "
      >
        <thead class="data-table__contain-table-header">
          <tr class="data-table__table-header-row">
            <th class="data-table__table-header-cell">
              Tên sản phẩm
            </th>
            <th class="data-table__table-header-cell">
              Màu sắc
            </th>
            <th class="data-table__table-header-cell">
              Kích thước
            </th>
            <th class="data-table__table-header-cell">
              Số lượng
            </th>
            <th class="data-table__table-header-cell">
              Giá tiền (VND)
            </th>
          </tr>
        </thead>
          <tbody class="data-table__contain-table-body">
            <?php
              foreach ($data_result as $row) {
                echo '
                  <tr class="data-table__table-body-row">
                    <td class="data-table__table-body-cell">
                      '.$row['ProductName'].'
                    </td>
                    <td class="data-table__table-body-cell">
                      <div 
                        class="data-table__preview-color"
                        style="
                          width: 4rem;
                          height: 3rem;
                          margin-top: 1.5rem;

                          background: #'.$row['FkColor_Id'].';

                          border-radius:0.5rem;
                          border: 0.2rem solid var(--black);
                        "
                      >
                      </div>
                    </td>
                    <td class="data-table__table-body-cell">
                      '.$row['ProductSize'].'
                    </td>
                    <td class="data-table__table-body-cell">
                      '.$row['OrderQuantity'].'
                    </td>
                    <td class="data-table__table-body-cell">
                      '.$row['ProductPrice'].'
                    </td>
                    <td class="data-table__table-body-cell" style="padding: 0;">
                    </td>
                  </tr>
                ';
              };
            ?>
          </tbody>
      </table>
    </div>
  </section>
<?php endif; ?>


