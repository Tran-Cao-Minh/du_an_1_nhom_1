<section class="filter-form">
  <input type="checkbox" id="filter-form__check">
  <label for="filter-form__check" class="filter-form__header">
    <div class="filter-form__title">
      Bộ lọc
    </div>
    <div class="filter-form__collapse-btn">
      <i class="fas fa-chevron-right filter-form__collapse-icon"></i>
    </div>
  </label>
  <div class="filter-form__body-container">
    <form class="filter-form__body">
      <div class="filter-form__form-group--first">
        <div class="filter-form__form-title">
          Chọn cột được lọc
        </div>
        <select name="filter_column" class="filter-form__select-input js-select-filter-column-input">
          <option value="PkOrder_Id" data-type="text" class="filter-form__select-option">
            Mã đơn hàng
          </option>
          <option value="OrderDate" data-type="date" class="filter-form__select-option">
            Ngày tạo
          </option>
          <option value="OrderTotalMoney" data-type="number" class="filter-form__select-option">
            Tổng tiền
          </option>
          <option value="OrderStatusName" data-type="text" class="filter-form__select-option">
            Trạng thái
          </option>
        </select>
      </div>
      <div class="filter-form__form-group">
        <div class="filter-form__form-title">
          Cơ chế sắp xếp
        </div>
        <div class="filter-form__radio-input-group">
          <div class="filter-form__radio-input-container">
            <input checked class="filter-form__radio-input" type="radio" name="sort_rule" id="asc" value="ASC">
            <label for="asc" class="filter-form__radio-input-label">Tăng dần</label>
          </div>
          <div class="filter-form__radio-input-container">
            <input class="filter-form__radio-input" type="radio" name="sort_rule" id="desc" value="DESC">
            <label for="desc" class="filter-form__radio-input-label">Giảm dần</label>
          </div>
        </div>
      </div>
      <div class="filter-form__form-group--open-sub-form">
        <div class="filter-form__form-title">
          Giá trị lọc
        </div>
        <div class="filter-form__radio-input-group js-check-open-filter-value-form">
          <div class="filter-form__radio-input-container">
            <input checked class="filter-form__radio-input" type="radio" name="filter_value" id="identify" value="identify">
            <label for="identify" class="filter-form__radio-input-label">Xác định</label>
          </div>
          <div class="filter-form__radio-input-container">
            <input class="filter-form__radio-input" type="radio" name="filter_value" id="interval" value="interval">
            <label for="interval" class="filter-form__radio-input-label">Theo khoảng</label>
          </div>
        </div>
      </div>
      <div class="js-enter-identify-value-form">
        <label for="filter_value_identify" class="filter-form__form-title">
          Giá trị cần tìm
        </label>
        <input type="text" name="filter_value_identify" id="filter_value_identify" class="filter-form__input js-filter-value-input">
        <div class="filter-form__notification">
          <!-- Some test case ~ -->
        </div>
      </div>
      <div class="js-enter-interval-value-form">
        <div class="filter-form__form-group--first">
          <label for="filter_value_interval_min" class="filter-form__form-title">
            Giá trị nhỏ nhất
          </label>
          <input type="text" name="filter_value_interval_min" id="filter_value_interval_min" class="filter-form__input js-filter-value-input">
          <div class="filter-form__notification">
            <!-- Some test case ~ -->
          </div>
        </div>
        <div class="filter-form__form-group">
          <label for="filter_value_interval_max" class="filter-form__form-title">
            Giá trị lớn nhất
          </label>
          <input type="text" name="filter_value_interval_max" id="filter_value_interval_max" class="filter-form__input js-filter-value-input">
          <div class="filter-form__notification">
            <!-- Some test case ~ -->
          </div>
        </div>
      </div>
      <button type="submit" class="filter-form__submit-btn"
        name="filter_confirm" value="true">
        Xác nhận lọc
      </button>
    </form>
  </div>
  <div class="filter-form__notification-container">
    <span class="filter-form__notification-title">Thông báo: </span>
    <span class="filter-form__notification-content">
      <?php echo $notification; ?>
    </span>
  </div>
</section>
<section class="data-table">
  <div class="data-table__header">
    <div class="data-table__header-title">
      Bảng dữ liệu
    </div>
  </div>
  <div class="data-table__body">
    <table class="data-table__table" 
      style="
        --cell-1-width: 15rem; 
        --cell-2-width: 15rem; 
        --cell-3-width: 16rem;
        --cell-4-width: 20rem;
        --cell-5-width: 8rem;
      "
    >
      <thead class="data-table__contain-table-header">
        <tr class="data-table__table-header-row">
          <th class="data-table__table-header-cell">
            Mã đơn hàng
          </th>
          <th class="data-table__table-header-cell">
            Ngày tạo
          </th>
          <th class="data-table__table-header-cell">
            Tổng tiền (VND)
          </th>
          <th class="data-table__table-header-cell">
            Trạng thái
          </th>
          <th class="data-table__table-header-cell"></th>
        </tr>
      </thead>
        <tbody class="data-table__contain-table-body">
          <?php if ($page_quantity !== 0): ?>
            <?php
              foreach ($data_result as $row) {
                echo '
                  <tr class="data-table__table-body-row">
                    <td class="data-table__table-body-cell">
                      '.$row['PkOrder_Id'].'
                    </td>
                    <td class="data-table__table-body-cell">
                      '.$row['OrderDate'].'
                    </td>
                    <td class="data-table__table-body-cell">
                      '.number_format($row['OrderTotalMoney'], 0, ',', '.').'
                    </td>
                    <td class="data-table__table-body-cell">
                      '.$row['OrderStatusName'].'
                    </td>
                    <td class="data-table__table-body-cell">
                      <a href="?view_name=update&object_id='.$row['PkOrder_Id'].'" class="data-table__view-detail-link">
                        <i class="fas fa-wrench data-table__view-detail-icon"></i>
                      </a>
                    </td>
                  </tr>
                ';
              };
            ?>
          <?php else: ?>
            <?php
                echo '
                  <tr class="data-table__table-body-row">
                    <td class="data-table__table-body-cell-empty-notification">
                      Không có dữ liệu thỏa điều kiện lọc
                    </td>
                  </tr>
                ';
            ?>
          <?php endif; ?>
        </tbody>
    </table>
  </div>
  <?php if ($page_quantity > 1): ?>
    <div class="data-table__footer">
      <ul class="data-table__footer-bread-crumb">
        <?php
          $offset = 2; // for paging link, offset need to >= 2
          include_once 'view/paging_link.php';
        ?>
      </ul>
    </div>
  <?php endif; ?>
</section>