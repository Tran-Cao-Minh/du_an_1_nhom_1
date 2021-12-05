<?php
  include_once '../global/connect_database.php';
  include_once 'model/m_product_detail.php';

  // some action like take banner, top product

  $link_css_arr = array (
    '../public/css/client/product_detail.css',
    '../public/css/client/product.css',
  );
  $link_js_arr = '';
  $view_link = 'view/v_product_detail.php';
?>