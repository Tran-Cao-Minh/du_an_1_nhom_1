<?php
  if ($check_login != true) {
    header('Location: /du_an_1_nhom_1/client/index.php?page=home');
  }

  $link_css_arr = array (
    '../public/css/client/pay_success.css',
  );
  $view_link = 'view/v_pay_success.php';
?>