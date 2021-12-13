<?php
  include_once 'model/m_order_list.php';

  if ($check_login == true) {
    $order_list = getAllOrder();
    
  } else {
    header('Location: /du_an_1_nhom_1/client/index.php?page=home');
  }
  

  $link_css_arr = array (
    '../public/css/client/order_list.css',
  );
  $view_link = 'view/v_order_list.php';
?>