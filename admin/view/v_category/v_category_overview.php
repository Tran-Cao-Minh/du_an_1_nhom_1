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
        <select class="filter-form__select-input js-select-filter-column-input">
          <option value="a" data-type="text" class="filter-form__select-option">
            Tên danh mục
          </option>
          <option value="v" data-type="text" class="filter-form__select-option">
            Mã danh mục
          </option>
        </select>
      </div>
      <div class="filter-form__form-group">
        <div class="filter-form__form-title">
          Cơ chế sắp xếp
        </div>
        <div class="filter-form__radio-input-group">
          <div class="filter-form__radio-input-container">
            <input class="filter-form__radio-input" type="radio" name="sort_rule" id="asc" value="asc">
            <label for="asc" class="filter-form__radio-input-label">Tăng dần</label>
          </div>
          <div class="filter-form__radio-input-container">
            <input class="filter-form__radio-input" type="radio" name="sort_rule" id="desc" value="desc">
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
            <input class="filter-form__radio-input" type="radio" name="sort_value" id="identify" value="identify">
            <label for="identify" class="filter-form__radio-input-label">Xác định</label>
          </div>
          <div class="filter-form__radio-input-container">
            <input class="filter-form__radio-input" type="radio" name="sort_value" id="interval" value="interval">
            <label for="interval" class="filter-form__radio-input-label">Theo khoảng</label>
          </div>
        </div>
      </div>
      <div class="js-enter-identify-value-form">
        <div class="filter-form__form-title">
          Giá trị cần tìm
        </div>
        <input type="text" name="" id="" class="filter-form__input js-filter-value-input">
        <div class="filter-form__notification">
          <!-- Some test case ~ -->
        </div>
      </div>
      <div class="js-enter-interval-value-form">
        <div class="filter-form__form-group--first">
          <div class="filter-form__form-title">
            Giá trị nhỏ nhất
          </div>
          <input type="text" name="" id="" class="filter-form__input js-filter-value-input">
          <div class="filter-form__notification">
            <!-- Some test case ~ -->
          </div>
        </div>
        <div class="filter-form__form-group">
          <div class="filter-form__form-title">
            Giá trị lớn nhất
          </div>
          <input type="text" name="" id="" class="filter-form__input js-filter-value-input">
          <div class="filter-form__notification">
            <!-- Some test case ~ -->
          </div>
        </div>
      </div>
      <button type="submit" class="filter-form__submit-btn">
        Xác nhận lọc
      </button>
    </form>
  </div>
  <div class="filter-form__notification-container">
    <span class="filter-form__notification-title">Thông báo: </span>
    <span class="filter-form__notification-content">
      Lọc danh mục thành công
    </span>
  </div>
</section>
<section class="data-table">
  <div class="data-table__header">
    <div class="data-table__header-title">
      Bảng dữ liệu
    </div>
    <div class="data-table__header-add-object">
      <div class="data-table__header-add-object-title">
        Thêm danh mục
      </div>
      <div class="data-table__header-add-object-contain-icon">
        <i class="fas fa-plus data-table__header-add-object-icon"></i>
      </div>
    </div>
  </div>
  <div class="data-table__body">
    <table class="data-table__table" style="--cell-1-width: 18rem; --cell-2-width: 25rem; --cell-3-width: 19rem;">
      <thead class="data-table__contain-table-header">
        <tr class="data-table__table-header-row">
          <th class="data-table__table-header-cell">
            Mã danh mục
          </th>
          <th class="data-table__table-header-cell">
            Tên danh mục
          </th>
          <th class="data-table__table-header-cell"></th>
        </tr>
      </thead>
      <tbody class="data-table__contain-table-body">
        <tr class="data-table__table-body-row">
          <td class="data-table__table-body-cell">
            1
          </td>
          <td class="data-table__table-body-cell">
            Giày thể thao
          </td>
          <td class="data-table__table-body-cell">
            <form class="data-table__table-cell-btn-group">
              <!-- <button type="submit" name="a" value="a" class="data-table__change-view-status-btn--show">
                <i class="fas fa-eye data-table__change-view-status-icon--show"></i>
              </button> -->
              <!-- <button type="submit" class="data-table__change-view-status-btn--not-show">
                      <i class="fas fa-eye-slash data-table__change-view-status-icon--not-show"></i>
                    </button> -->
              <button type="submit" class="data-table__delete-btn">
                <i class="far fa-trash-alt data-table__delete-icon"></i>
              </button>
            </form>
            <a href="#" class="data-table__view-detail-link">
              <i class="fas fa-wrench data-table__view-detail-icon"></i>
            </a>
          </td>
        </tr>
        <tr class="data-table__table-body-row">
          <td class="data-table__table-body-cell">
            1
          </td>
          <td class="data-table__table-body-cell">
            Giày thể thao
            Giày thể thao
            Giày thể thao
            Giày thể thao
          </td>
          <td class="data-table__table-body-cell">
            <form class="data-table__table-cell-btn-group">
              <!-- <button type="submit" name="a" value="a" class="data-table__change-view-status-btn--show">
                      <i class="fas fa-eye data-table__change-view-status-icon--show"></i>
                    </button> -->
              <button type="submit" class="data-table__change-view-status-btn--not-show">
                <i class="fas fa-eye-slash data-table__change-view-status-icon--not-show"></i>
              </button>
              <button type="submit" class="data-table__delete-btn">
                <i class="far fa-trash-alt data-table__delete-icon"></i>
              </button>
            </form>
            <a href="#" class="data-table__view-detail-link">
              <i class="fas fa-wrench data-table__view-detail-icon"></i>
            </a>
          </td>
        </tr>
        <tr class="data-table__table-body-row">
          <td class="data-table__table-body-cell">
            1
          </td>
          <td class="data-table__table-body-cell">
            Giày thể thao
          </td>
          <td class="data-table__table-body-cell">
            <form class="data-table__table-cell-btn-group">
              <!-- <button type="submit" name="a" value="a" class="data-table__change-view-status-btn--show">
                      <i class="fas fa-eye data-table__change-view-status-icon--show"></i>
                    </button> -->
              <button type="submit" class="data-table__change-view-status-btn--not-show">
                <i class="fas fa-eye-slash data-table__change-view-status-icon--not-show"></i>
              </button>
              <button type="submit" class="data-table__delete-btn">
                <i class="far fa-trash-alt data-table__delete-icon"></i>
              </button>
            </form>
            <a href="#" class="data-table__view-detail-link">
              <i class="fas fa-wrench data-table__view-detail-icon"></i>
            </a>
          </td>
        </tr>
        <tr class="data-table__table-body-row">
          <td class="data-table__table-body-cell">
            1
          </td>
          <td class="data-table__table-body-cell">
            Giày thể thao
          </td>
          <td class="data-table__table-body-cell">
            <form class="data-table__table-cell-btn-group">
              <!-- <button type="submit" name="a" value="a" class="data-table__change-view-status-btn--show">
                      <i class="fas fa-eye data-table__change-view-status-icon--show"></i>
                    </button> -->
              <button type="submit" class="data-table__change-view-status-btn--not-show">
                <i class="fas fa-eye-slash data-table__change-view-status-icon--not-show"></i>
              </button>
              <button type="submit" class="data-table__delete-btn">
                <i class="far fa-trash-alt data-table__delete-icon"></i>
              </button>
            </form>
            <a href="#" class="data-table__view-detail-link">
              <i class="fas fa-wrench data-table__view-detail-icon"></i>
            </a>
          </td>
        </tr>
        <tr class="data-table__table-body-row">
          <td class="data-table__table-body-cell">
            1
          </td>
          <td class="data-table__table-body-cell">
            Giày thể thao
          </td>
          <td class="data-table__table-body-cell">
            <form class="data-table__table-cell-btn-group">
              <!-- <button type="submit" name="a" value="a" class="data-table__change-view-status-btn--show">
                      <i class="fas fa-eye data-table__change-view-status-icon--show"></i>
                    </button> -->
              <button type="submit" class="data-table__change-view-status-btn--not-show">
                <i class="fas fa-eye-slash data-table__change-view-status-icon--not-show"></i>
              </button>
              <button type="submit" class="data-table__delete-btn">
                <i class="far fa-trash-alt data-table__delete-icon"></i>
              </button>
            </form>
            <a href="#" class="data-table__view-detail-link">
              <i class="fas fa-wrench data-table__view-detail-icon"></i>
            </a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="data-table__footer">
    <ul class="data-table__footer-bread-crumb">
      <li>
        <a href="#" class="data-table__footer-bread-crumb-link">
          1
        </a>
      </li>
      <li>
        <a href="#" class="data-table__footer-bread-crumb-link">
          2
        </a>
      </li>
      <li>
        <span class="data-table__footer-bread-crumb-link--disabled">
          3
        </span>
      </li>
      <li>
        <a href="#" class="data-table__footer-bread-crumb-link">
          4
        </a>
      </li>
      <li>
        <a href="#" class="data-table__footer-bread-crumb-link">
          <i class="data-table__footer-bread-crumb-link-icon fas fa-angle-double-right"></i>
        </a>
      </li>
    </ul>
  </div>
</section>