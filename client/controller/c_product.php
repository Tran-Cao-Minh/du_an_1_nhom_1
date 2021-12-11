<?php
  include_once 'model/m_product.php';

  $product_brand_list = getProductBrand();
  $product_color_list = getProductColor();
  $product_size_list = getProductSize();


  $link_css_arr = array (
    '../public/css/client/product.css',
  );
  $link_js_arr[] = '../public/js/client/product/send_product_request.js';
  $link_js_arr[] = '../public/js/client/product/create_label.js';
  $link_js_arr[] = '../public/js/client/product/buy_product_form_interaction.js';
  $link_js_arr[] = '../public/js/client/product/close_buy_product_form.js';

  $view_link = 'view/v_product.php';
?>