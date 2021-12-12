<?php
  include_once '../global/connect_database.php';
  $conn = connectDatabase();

  $key_word = $_GET['key_word'];
  $category_list = $_GET['category_list'];
  $brand_list = $_GET['brand_list'];
  $color_list = $_GET['color_list'];
  $size_list = $_GET['size_list'];
  $price_range = $_GET['price_range'];
  $order_rule = $_GET['order_rule'];
  $page_num = $_GET['page_num'];

  $page_size = 9;
  $start_point = ($page_num - 1) * $page_size;

  // get product list in db
  $sql_add = ' WHERE `ProductViewStatus` = 1';

  if ($key_word != '') {
    $keyword_list = preg_split('/[\s,]+/', $key_word);

    $sql_add .= " AND `ProductName` 
                  IN ( 
                    SELECT `ProductName`
                    FROM `product`
                    WHERE";

    foreach ($keyword_list as $keyword) {
      $sql_add .= " `ProductName` LIKE '%$keyword%' AND";
    }
    $sql_add = substr($sql_add, 0, -3);
    $sql_add .= " )";
  }

  $category_list = json_decode($category_list);
  if (count($category_list) > 0) {
    $sql_add .= " AND `FkType_Id` 
                  IN ( 
                    SELECT `FkType_Id`
                    FROM `product`
                    WHERE";

    foreach ($category_list as $category) {
        $sql_add .= " `FkType_Id` = '$category' OR";
    }
    $sql_add = substr($sql_add, 0, -3);
    $sql_add .= " )";
  }

  $brand_list = json_decode($brand_list);
  if (count($brand_list) > 0) {
    $sql_add .= " AND `FKBrand_Id` 
                  IN ( 
                    SELECT `FKBrand_Id`
                    FROM `product`
                    WHERE";

    foreach ($brand_list as $brand) {
        $sql_add .= " `FKBrand_Id` = '$brand' OR";
    }
    $sql_add = substr($sql_add, 0, -3);
    $sql_add .= " )";
  }

  $color_list = json_decode($color_list);
  if (count($color_list) > 0) {
    $sql_add .= " AND `FkColor_Id` 
                  IN ( 
                    SELECT `FkColor_Id`
                    FROM `product`
                    WHERE";

    foreach ($color_list as $color) {
        $sql_add .= " `FkColor_Id` = '$color' OR";
    }
    $sql_add = substr($sql_add, 0, -3);
    $sql_add .= " )";
  }

  $size_list = json_decode($size_list);
  if (count($size_list) > 0) {
    $sql_add .= " AND `FkColor_Id` 
                  IN ( 
                    SELECT `FkColor_Id`
                    FROM `product_variant`
                    WHERE";

    foreach ($size_list as $size) {
        $sql_add .= " `ProductSize` = '$size' OR";
    }
    $sql_add = substr($sql_add, 0, -3);
    $sql_add .= " )";

    $sql_add .= " AND `FkProduct_Id` 
                  IN ( 
                    SELECT `FkProduct_Id`
                    FROM `product_variant`
                    WHERE";

    foreach ($size_list as $size) {
        $sql_add .= " `ProductSize` = '$size' OR";
    }
    $sql_add = substr($sql_add, 0, -3);
    $sql_add .= " )";
  }

  if ($price_range != 'allPrice') {
    $sql_add .= " AND `ProductPrice` 
                  IN ( 
                    SELECT `ProductPrice`
                    FROM `product`
                    WHERE";
      
    switch ($price_range) {
      case 'below1m':
          $sql_add .= " `ProductPrice` < 1000000 )";
          break;

      case '1mTo2m':
          $sql_add .= " `ProductPrice` BETWEEN 1000000 AND 2000000 )";
          break;

      case '2mTo3m':
          $sql_add .= " `ProductPrice` BETWEEN 2000000 AND 3000000 )";
          break;

      case 'over3m':
          $sql_add .= " `ProductPrice` > 3000000 )";
          break;
    }
  }
  
  $sql = "SELECT 
            p.`PkProduct_Id`
          FROM `product` p
          INNER JOIN `product_image` p_i
          ON p.`PkProduct_Id` = p_i.`FkProduct_Id`
          ".$sql_add."
          GROUP BY `PkProduct_Id`";
    
  $stmt = $conn->query($sql);
  $product_quantity = $stmt->rowCount();

  switch ($order_rule) {
    case 'newest':
      $sql_order = "ORDER BY `PkProduct_Id` DESC";
      break;

    case 'most':
      $sql_order = "ORDER BY `ProductView` DESC";
      break;

    case 'priceDown':
      $sql_order = "ORDER BY `ProductPrice` DESC";
      break;
        
    case 'priceUp':
      $sql_order = "ORDER BY `ProductPrice` ASC";
      break;
  }

  $sql = "SELECT 
            p.`PkProduct_Id`, 
            p.`ProductName`, 
            p.`ProductPrice`, 
            p.`ProductDiscount`,
            p_i.`FkColor_Id`,
            p_i.`ImageFileName`
          FROM `product` p
          INNER JOIN `product_image` p_i
          ON p.`PkProduct_Id` = p_i.`FkProduct_Id`
          INNER JOIN
          ( SELECT p.`PkProduct_Id`
            FROM `product` p
            INNER JOIN `product_image` p_i
            ON p.`PkProduct_Id` = p_i.`FkProduct_Id`
            ".$sql_add."
            GROUP BY `PkProduct_Id`
            ".$sql_order."
            LIMIT $start_point, $page_size ) id
          ON p.`PkProduct_Id` = id.`PkProduct_Id`
          GROUP BY `PkProduct_Id`, `FkColor_Id`";

  switch ($order_rule) {
    case 'newest':
      $sql .= " ORDER BY `PkProduct_Id` DESC, `PkProduct_Id`";
      break;

    case 'most':
      $sql .= " ORDER BY `ProductView` DESC, `PkProduct_Id`";
      break;

    case 'priceDown':
      $sql .= " ORDER BY `ProductPrice` DESC, `PkProduct_Id`";
      break;
        
    case 'priceUp':
      $sql .= " ORDER BY `ProductPrice` ASC, `PkProduct_Id`";
      break;
  }

  $stmt = $conn->query($sql);
  $product_list = $stmt->fetchALL(PDO::FETCH_ASSOC);

  $output = '';
  if ($product_quantity > 0) {
    $prev_product_id = '';
    $prev_product_name = '';
    $prev_product_price = '';
    $prev_product_discount = '';
    $prev_product_color = '';
    $prev_product_img = '';

    foreach ($product_list as $product) {
      if ($prev_product_id != $product['PkProduct_Id']) {
        if ($prev_product_id != '') {
          $old_price = ($prev_product_price / (100 - $prev_product_discount));
          $old_price = ceil($old_price) * 100;
          $output .= '
            <div class="product__column">
              <a href="?page=product_detail&product_id='.$prev_product_id.'"> 
                <div class="product__image">
                    <img 
                      src="../public/image/product/'.$prev_product_img.'" 
                      alt="'.$prev_product_name.'"
                    >
                </div>
              </a>
              <div class="product__info">
                <div class="product__variant">
                  '.$prev_product_color.'
                </div>
                <div class="product__name">
                  <p>'.$prev_product_name.'</p>
                </div>
                <div class="product__price">
                  <div class="product__price--new">
                    '.number_format($prev_product_price, 0, ',', '.').'đ
                  </div>
                  <div class="product__price--old">
                    <span> 
                      '.number_format($old_price, 0, ',', '.').'
                    </span> 
                    <small>đ</small>
                  </div>
                </div>
              </div>
              <div class="product__button">
                <button type="button" class="js-buy-prod-btn" 
                  data-product-id="'.$prev_product_id.'"
                >
                  Mua Hàng
                </button>
              </div>
            </div>
          ';
        }

        $prev_product_id = $product['PkProduct_Id'];
        $prev_product_name = $product['ProductName'];
        $prev_product_price = $product['ProductPrice'];
        $prev_product_discount = $product['ProductDiscount'];
        $prev_product_color = '
          <div class="product__variant__item">
            <div class="product__variant--color"
              data-img-file-name="'.$product['ImageFileName'].'"
              style="--bg-color: #'.$product['FkColor_Id'].'"
            >
            </div>
          </div>
        ';
        $prev_product_img = $product['ImageFileName'];

      } else {
        $prev_product_color .= '
          <div class="product__variant__item">
            <div class="product__variant--color"
              data-img-file-name="'.$product['ImageFileName'].'"
              style="--bg-color: #'.$product['FkColor_Id'].'"
            >
            </div>
          </div>
        ';
      }
    }

    // add last product into container
    $old_price = ($prev_product_price / (100 - $prev_product_discount));
    $old_price = ceil($old_price) * 100;
    $output .= '
      <div class="product__column">
        <a href="?page=product_detail&product_id='.$prev_product_id.'"> 
          <div class="product__image">
              <img 
                src="../public/image/product/'.$prev_product_img.'" 
                alt="'.$prev_product_name.'"
              >
          </div>
        </a>
        <div class="product__info">
          <div class="product__variant">
            '.$prev_product_color.'
          </div>
          <div class="product__name">
            <p>'.$prev_product_name.'</p>
          </div>
          <div class="product__price">
            <div class="product__price--new">
              '.number_format($prev_product_price, 0, ',', '.').'đ
            </div>
            <div class="product__price--old">
              <span> 
                '.number_format($old_price, 0, ',', '.').'
              </span> 
              <small>đ</small>
            </div>
          </div>
        </div>
        <div class="product__button">
          <button type="button" class="js-buy-prod-btn" 
            data-product-id="'.$prev_product_id.'"
          >
            Mua Hàng
          </button>
        </div>
      </div>
    ';


    // create and add paging link
    $page_quantity = $product_quantity / $page_size;
    $offset = 2;
    $max_paging_link = ($offset * 2) + 1;

    if ($page_quantity > 1) {
      $paging_link_list = '<ul class="product__pagination">';
      if ($page_quantity <= $max_paging_link) {
        for ($i = 1; $i < ($page_quantity + 1); $i++) {
          if ($i == $page_num) {
            $paging_link_list .= '
              <li class="product__pagination__link--active">
                '.$i.'
              </li>
            ';
          } else {
            $paging_link_list .= '
              <li 
                data-page-num="'.$i.'"
                class="js-change-product-page product__pagination__link"
              >
                '.$i.'
              </li>
            ';
          }
        }
      } elseif ($page_quantity > $max_paging_link) {
        if ($page_num >= ($offset + 1) && $page_num <= ($page_quantity - $offset)) {
          $paging_link_list .= '
            <li 
              data-page-num="1"
              class="js-change-product-page product__pagination__link"
            >
              <i class="fas fa-angle-double-left"></i>
            </li>
          ';
          $prev_page = $page_num - 1;
          $paging_link_list .= '
            <li 
              data-page-num="'.$prev_page.'"
              class="js-change-product-page product__pagination__link"
            >
              '.$prev_page.'
            </li>
          ';
          $paging_link_list .= '
            <li class="product__pagination__link--active">
              '.$page_num.'
            </li>
          ';
          $next_page = $page_num + 1;
          $paging_link_list .= '
            <li 
              data-page-num="'.$next_page.'"
              class="js-change-product-page product__pagination__link"
            >
              '.$next_page.'
            </li>
          ';
          $paging_link_list .= '
            <li 
              data-page-num="'.$page_quantity.'"
              class="js-change-product-page product__pagination__link"
            >
              <i class="fas fa-angle-double-right"></i>
            </li>
          ';
        } elseif ($page_num < ($offset + 1)) {
          for ($i = 1; $i <= ($offset + 2); $i++) {
            if ($i == $page_num) {
              $paging_link_list .= '
                <li class="product__pagination__link--active">
                  '.$i.'
                </li>
              ';
            } else {
              $paging_link_list .= '
                <li 
                  data-page-num="'.$i.'"
                  class="js-change-product-page product__pagination__link"
                >
                  '.$i.'
                </li>
              ';
            }
          }
          $paging_link_list .= '
            <li 
              data-page-num="'.$page_quantity.'"
              class="js-change-product-page product__pagination__link"
            >
              <i class="fas fa-angle-double-right"></i>
            </li>
          ';
        } elseif ($page_num > ($page_quantity - $offset)) {
          $paging_link_list .= '
            <li 
              data-page-num="1"
              class="js-change-product-page product__pagination__link"
            >
              <i class="fas fa-angle-double-left"></i>
            </li>
          ';
          for ($i = ($page_quantity - ($offset + 1)); $i <= $page_quantity; $i++) {
            if ($i == $page_num) {
              $paging_link_list .= '
                <li class="product__pagination__link--active">
                  '.$i.'
                </li>
              ';
            } else {
              $paging_link_list .= '
                <li 
                  data-page-num="'.$i.'"
                  class="js-change-product-page product__pagination__link"
                >
                  '.$i.'
                </li>
              ';
            }
          }
        }
      }
      $paging_link_list .= '</ul>';
      $output .= $paging_link_list;
    }
  } else { 
    $output .= ' 
      <div class="product__section-empty">
        <i class="product__section-empty-icon far fa-laugh-beam"></i>
        Không có sản phẩm thỏa điều kiện lọc của bạn <br>
        Bạn vui lòng thay đổi điều kiện lọc nhé!
      </div>
    ';
  }

  // $output .= $sql; //########################################
  // $output .= $product_list; //########################################
  // $output .= $product_quantity; //########################################

  $conn = null;
  echo $output;
?>