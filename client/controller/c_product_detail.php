<?php
  include_once 'model/m_product_detail.php';

  if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $check_product_id = checkProductIdExist($product_id);
    if ($check_product_id == true) {
      increaseProductView($product_id);
      $product_data = getProductDataById($product_id);
      $product_variant_list = getProductVariantDataById($product_id);
      $product_image_list = getProductImageDataById($product_id);

    } else {
      $product_data = '';
    }
  } else {
    $product_data = '';
  }

  // if ($product_data == '') {
  //   header('Location: /du_an_1_nhom_1/client/index.php?page=home');
  // }

  $link_css_arr = array (
    '../public/css/client/product_detail.css',
    '../public/css/client/product.css',
  );
  $link_js_arr[] = '../public/js/client/product_detail/change_data_by_color.js';
  $view_link = 'view/v_product_detail.php';
?>