<?php
  include_once '../global/connect_database.php';

  $order_rule = $_GET['order_rule'];
  $price_range = $_GET['price_range'];
  $brand_list = $_GET['brand_list'];
  $color_list = $_GET['color_list'];
  $size_list = $_GET['size_list'];
  $page_num = $_GET['page_num'];
  $key_word = $_GET['key_word'];

  $page_size = 12;
  $start_point = ($page_num - 1) * $page_size;

  // tao cau lenh sql lay danh sach san pham
  $sql_add = 'WHERE `tinh_trang` = 1 ';

  if ($key_word != '') {
      $sql_add .= "AND `ma_san_pham` 
                  IN ( SELECT `ma_san_pham`
                       FROM `san_pham`
                       WHERE `ten_san_pham` LIKE '%$key_word%' 
                     ) ";
  }

  $category_list = json_decode($category_list);
  if (count($category_list) > 0) {
      $sql_add .= "AND `ma_danh_muc` 
                  IN ( SELECT `ma_danh_muc`
                       FROM `san_pham`
                       WHERE ";

      foreach ($category_list as $category) {
          $sql_add .= "`ma_danh_muc` = '$category' OR ";
      }
      $sql_add = substr($sql_add, 0, -3);
      $sql_add .= ") ";
  }

  $price_range_list = json_decode($price_range_list);
  if (count($price_range_list) > 0) {
      $sql_add .= "AND `don_gia` 
                  IN ( SELECT `don_gia`
                       FROM `san_pham`
                       WHERE ";
      
      foreach ($price_range_list as $price_range) {
          switch ($price_range) {
              case 'duoi_50_ngan':
                  $sql_add .= "`don_gia` < 50000 OR ";
                  break;

              case 'tu_50_den_100_ngan':
                  $sql_add .= "`don_gia` BETWEEN 50000 AND 100000 OR ";
                  break;

              case 'tu_100_den_150_ngan':
                  $sql_add .= "`don_gia` BETWEEN 100000 AND 150000 OR ";
                  break;

              case 'tu_150_den_200_ngan':
                  $sql_add .= "`don_gia` BETWEEN 150000 AND 200000 OR ";
                  break;

              case 'tren_200_ngan':
                  $sql_add .= "`don_gia` > 200000 OR ";
                  break;
          }
      }
      $sql_add = substr($sql_add, 0, -3);
      $sql_add .= ") ";
  }
  
  $sql = "SELECT `ma_san_pham`, `ten_san_pham`, `ten_file_anh`, `don_gia`, `phan_tram_giam_gia`
          FROM `san_pham` " . $sql_add;

  switch ($order_rule) {
      case 'moi_nhat':
          $sql .= "ORDER BY `ngay_tao` DESC ";
          break;

      case 'noi_bat_nhat':
          $sql .= "ORDER BY `so_luot_xem` DESC ";
          break;

      case 'gia_tang_dan':
          $sql .= "ORDER BY `don_gia` ASC ";
          break;
          
      case 'gia_giam_dan':
          $sql .= "ORDER BY `don_gia` DESC ";
          break;
  }

  $sql .= "LIMIT $limit_start, $page_size";

  $product_list = $connect_database->query($sql);

  // tra ve ket qua theo so luong san pham dem duoc
  $product_quantity_data = $connect_database->query("SELECT 
                                              COUNT(*) 
                                              FROM `san_pham` " . $sql_add);
  $product_quantity_data = $product_quantity_data->fetch_array();
  $product_quantity = $product_quantity_data[0];
  
?>