<section class="statistic-chart">
  <?php if ($page_quantity !== 0): ?>
    <div class="statistic-chart__header">
      Thống kê sản phẩm
    </div>
    <div class="statistic-chart__choose-statistic-group">
      <?php 
        if ($choose_statistic_value != 'product_quantity') {
          echo '
            <a href="?choose_statistic_value=product_quantity" class="statistic-chart__choose-statistic-item">
              Số lượng
            </a>
          ';
        } else {
          echo '
            <div class="statistic-chart__choose-statistic-item--choosen">
              Số lượng
            </div>
          ';
        }
        if ($choose_statistic_value != 'product_inventory') {
          echo '
            <a href="?choose_statistic_value=product_inventory" class="statistic-chart__choose-statistic-item">
              Tồn kho
            </a>
          ';
        } else {
          echo '
            <div class="statistic-chart__choose-statistic-item--choosen">
              Tồn kho
            </div>
          ';
        }
        if ($choose_statistic_value != 'product_sold') {
          echo '
            <a href="?choose_statistic_value=product_sold" class="statistic-chart__choose-statistic-item">
              Đã bán
            </a>
          ';
        } else {
          echo '
            <div class="statistic-chart__choose-statistic-item--choosen">
              Đã bán
            </div>
          ';
        }
      ?>
    </div>
    <div class="statistic-chart__contain-chart">
      <canvas class="statistic-chart__chart" id="myChart"></canvas>
    </div>
    <!-- get data from php to js -->
    <?php
      $color_set = array (
          '#a2d2ffdd',
          '#F43B86dd',
          '#a5e1addd',
          '#B980F0dd'
      );

      $statistic_category_quantity = 0;
      $other_category_data = 0;

      $label_list = '[';
      $data_list = '[';
      foreach ($data_result as $data) {
        if ($data[$order_column] > 0) {
          $statistic_category_quantity++;

          if ($statistic_category_quantity <= 3) {
              $type_name = ucwords($data['ProductType']);
              $label_list = $label_list . '"'.$type_name.'"' . ', ';

              $data_list = $data_list . $data[$order_column] . ', ';

          } else {
              $other_category_data += $data[$order_column];
          }

        }
      }
      if ($other_category_data > 0) {
          $label_list .= '"Khác", ]';
          $data_list = $data_list . $other_category_data . ', ]';
          $color_set = $color_set;

      } else {
          $label_list .= ']';
          $data_list .= ']';
          while ($statistic_category_quantity <= 3) {
            array_pop($color_set);
            $statistic_category_quantity++;
          }
          // $color_set = array_pad($color_set, $statistic_category_quantity, 0);
      }

      $color_list = '[';
      foreach ($color_set as $color) {
          $color_list = $color_list . '"'.$color.'"' . ', ';
      }
      $color_list .= ']';
  ?>
    <!-- link chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      var ctx = document.getElementById('myChart').getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: <?php echo $label_list; ?>,
          datasets: [{
            data: <?php echo $data_list; ?>,
            backgroundColor: <?php echo $color_list; ?>,
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: 'bottom',
            },
          }
        }
      });
    </script>
  <?php endif; ?>
</section>
<section class="data-table">
  <div class="data-table__body">
    <table class="data-table__table" 
      style="
        --cell-1-width: 20rem; 
        --cell-2-width: 16rem; 
        --cell-3-width: 12rem;
        --cell-4-width: 12rem;
        --cell-5-width: 8rem;
      "
    >
      <thead class="data-table__contain-table-header">
        <tr class="data-table__table-header-row">
          <th class="data-table__table-header-cell">
            Tên danh mục
          </th>
          <th class="data-table__table-header-cell">
            Số sản phẩm
          </th>
          <th class="data-table__table-header-cell">
            Đã bán
          </th>
          <th class="data-table__table-header-cell">
            Tồn kho
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
                      '.$row['ProductType'].'
                    </td>
                    <td class="data-table__table-body-cell">
                      '.$row['MainProduct'].'
                    </td>
                    <td class="data-table__table-body-cell">
                      '.$row['ProductSold'].'
                    </td>
                    <td class="data-table__table-body-cell">
                      '.$row['ProductInventory'].'
                    </td>
                    <td class="data-table__table-body-cell">
                      <a 
                        href="?page_name=manage_product&view_name=overview&filter_column=FkType_Id&filter_value=identify&filter_value_identify='.$row['TypeId'].'&sort_rule=ASC&filter_confirm=true" 
                        class="data-table__view-statistic-detail-link">
                        <i class="fas fa-info data-table__view-statistic-detail-icon"></i>
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