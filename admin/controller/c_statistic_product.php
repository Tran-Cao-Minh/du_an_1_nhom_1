<?php
  include_once 'model/m_statistic_product.php';

  if (isset($_GET['choose_statistic_value'])) {
    $_SESSION['choose_statistic_value'] = $_GET['choose_statistic_value'];

  } elseif (!isset($_SESSION['choose_statistic_value'])) {
    $_SESSION['choose_statistic_value'] = 'product_quantity';
  }
  $choose_statistic_value = $_SESSION['choose_statistic_value'];
  
  $page_quantity = '';
  $page_size = 6;

  if (isset($_GET['page_num'])) {
    $_SESSION['page_num'] = $_GET['page_num'];

  } elseif (!isset($_SESSION['page_num'])) {
    $_SESSION['page_num'] = 1;
  }
  
  switch ($choose_statistic_value) {
    case 'product_quantity':
      $order_column = 'MainProduct';
      break;
    case 'product_inventory':
      $order_column = 'ProductInventory';
      break;
    case 'product_sold':
      $order_column = 'ProductSold';
      break;
  }

  $data_result = getStatisticProductData (
    $choose_statistic_value,
    $_SESSION['page_num'],
    $page_size,
    $order_column
  );

  $link_css_arr = array (
    '../public/css/admin/statistic_chart.css',
    '../public/css/admin/data_table.css',
  );
  $link_js_arr = '';
  $view_link = 'v_statistic_product.php';
?>