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
          <option value="ProductName" data-type="text" class="filter-form__select-option">
            Tên sản phẩm
          </option>
          <option value="ProductPrice" data-type="number" class="filter-form__select-option">
            Giá sản phẩm
          </option>
          <option value="ProductView" data-type="number" class="filter-form__select-option">
            Số lượt xem
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
    <a href="?view_name=add" class="data-table__header-add-object">
      <div class="data-table__header-add-object-title">
        Thêm sản phẩm
      </div>
      <div class="data-table__header-add-object-contain-icon">
        <i class="fas fa-plus data-table__header-add-object-icon"></i>
      </div>
    </a>
  </div>
  <div class="data-table__body">
    <table class="data-table__table" 
      style="--cell-1-width: 30rem; --cell-2-width: 25rem; --cell-3-width: 13.5rem; --cell-4-width: 19rem;">
      <thead class="data-table__contain-table-header">
        <tr class="data-table__table-header-row">
          <th class="data-table__table-header-cell">
            Tên sản phẩm
          </th>
          <th class="data-table__table-header-cell">
            Giá sản phẩm (VND)
          </th>
          <th class="data-table__table-header-cell">
            Số lượt xem
          </th>
          <th class="data-table__table-header-cell"></th>
        </tr>
      </thead>
        <tbody class="data-table__contain-table-body">
          <?php if ($page_quantity !== 0): ?>
            <?php
              foreach ($data_result as $row) {
                if ($row['ProductViewStatus'] == 1) {
                  $change_view_status_btn = '
                    <button type="submit" name="change_view_status" value="true" class="data-table__change-view-status-btn--show">
                      <i class="fas fa-eye data-table__change-view-status-icon--show"></i>
                    </button>
                  ';
                } else {
                  $change_view_status_btn = '
                    <button type="submit" name="change_view_status" value="false" class="data-table__change-view-status-btn--not-show">
                      <i class="fas fa-eye-slash data-table__change-view-status-icon--not-show"></i>
                    </button>
                  ';
                }
                echo '
                  <tr class="data-table__table-body-row">
                    <td class="data-table__table-body-cell">
                      '.$row['ProductName'].'
                    </td>
                    <td class="data-table__table-body-cell">
                      '.number_format($row['ProductPrice'], 0, ',', '.').'
                    </td>
                    <td class="data-table__table-body-cell">
                      '.$row['ProductView'].'
                    </td>
                    <td class="data-table__table-body-cell">
                      <form class="data-table__table-cell-btn-group">
                        <input type="hidden" name="object_id" value="'.$row['PkProduct_Id'].'">
                        <input type="hidden" name="product_name" value="'.$row['ProductName'].'">
                        '.$change_view_status_btn.'
                        <button type="submit" name="delete_confirm" value="true" class="data-table__delete-btn">
                          <i class="far fa-trash-alt data-table__delete-icon"></i>
                        </button>
                      </form>
                      <a href="?view_name=update&object_id='.$row['PkProduct_Id'].'" class="data-table__view-detail-link">
                        <i class="fas fa-wrench data-table__view-detail-icon"></i>
                      </a>
                    </td>
                  </tr>
                ';
              };
            ?>
            <!-- <input type="hidden" name="object_id" value=""> -->
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