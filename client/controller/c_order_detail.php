<?php
  include_once 'model/m_order_detail.php';

  if (
    $check_login == true && 
    isset($_GET['order_id'])
  ) {
    $order_id = $_GET['order_id'];
    $order_data = getOrderDataById($order_id);

    if ($order_data['PkOrder_Id'] == '') {
      header('Location: /du_an_1_nhom_1/client/index.php?page=home');
    } else {
      $product_list = getOrderProductInf($order_id);
    }

  } else {
    header('Location: /du_an_1_nhom_1/client/index.php?page=home');
  }

  $link_css_arr = array (
    '../public/css/client/order_detail.css',
  );
  $view_link = 'view/v_order_detail.php';
?>