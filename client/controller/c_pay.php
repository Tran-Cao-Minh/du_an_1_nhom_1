<?php
  include_once 'model/m_pay.php';

  if ($check_login == true) {
    $user_data = getUserData();
  } else {
    $user_data = '';
  }

  if ($user_data != '') {
    $user_name = $user_data['CustomerName'];
    $user_phone = $user_data['CustomerPhone'];
  } else {
    $user_name = '';
    $user_phone = '';
  }

  $link_css_arr = array (
    '../public/css/client/pay.css',
  );
  $link_js_arr[] = '../public/js/validation/pay_check.js';
  $link_js_arr[] = '../public/js/client/pay/pay_interaction.js';
  $view_link = 'view/v_pay.php';
?>