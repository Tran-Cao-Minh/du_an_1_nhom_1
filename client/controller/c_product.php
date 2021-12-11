<?php
  include_once 'model/m_product.php';

  $product_brand_list = getProductBrand();
  $product_color_list = getProductColor();
  $product_size_list = getProductSize();


  $link_css_arr = array (
    '../public/css/client/product.css',
  );
  $link_js_arr = array (
    '../public/js/client/product/send_product_request.js',
    '../public/js/client/product/create_label.js',
    '../public/js/client/product/change_session_filter.js',
  );
  $view_link = 'view/v_product.php';
?>