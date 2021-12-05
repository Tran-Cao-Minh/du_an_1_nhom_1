<?php
  include_once 'model/m_product.php';

  if (isset($_GET['view_name'])) {
    $_SESSION['view_name'] = $_GET['view_name'];

  } elseif (isset($_POST['view_name'])) {
    $_SESSION['view_name'] = $_POST['view_name'];

  } elseif (!isset($_SESSION['view_name'])) {
    $_SESSION['view_name'] = 'add';
  }
  $view_name = $_SESSION['view_name'];

  switch ($view_name) {
    case 'overview':
      $notification = '';
      
      // DELETE DATA
      if (isset($_GET['delete_confirm']) && isset($_GET['object_id'])) {
        $object_id = $_GET['object_id'];
        deleteCategory($object_id);
      }
      // END DELETE DATA

      // DATA FILTER
      $page_quantity = '';
      $page_size = 6;

      if (isset($_GET['filter_confirm'])) {
        $_SESSION['filter_confirm'] = $_GET['filter_confirm'];

        $_SESSION['filter_column'] = $_GET['filter_column'];
        $_SESSION['sort_rule'] = $_GET['sort_rule'];

        if (isset($_GET['filter_value'])) {
          $_SESSION['filter_value'] = $_GET['filter_value'];
        }

        if ($_SESSION['filter_value'] === 'identify') {
          $_SESSION['filter_value_identify'] = $_GET['filter_value_identify'];

        } elseif ($_SESSION['filter_value'] === 'interval') {
          $_SESSION['filter_value_interval_min'] = $_GET['filter_value_interval_min'];
          $_SESSION['filter_value_interval_max'] = $_GET['filter_value_interval_max'];
        }

      } elseif (!isset($_SESSION['filter_confirm'])) {
        $_SESSION['filter_confirm'] = 'true';

        $_SESSION['filter_column'] = 'PkType_Id';
        $_SESSION['sort_rule'] = 'ASC';

        $_SESSION['filter_value'] = 'identify';
        $_SESSION['filter_value_identify'] = '';
      }

      if (isset($_GET['page_num'])) {
        $_SESSION['page_num'] = $_GET['page_num'];

      } elseif (!isset($_SESSION['page_num'])) {
        $_SESSION['page_num'] = 1;
      }

      if ($_SESSION['filter_value'] === 'identify') {
        $data_result = getCategoryByIdentifyValue(
          $_SESSION['filter_column'],
          $_SESSION['sort_rule'],
          $_SESSION['filter_value_identify'],
          $_SESSION['page_num'],
          $page_size
        );

      } else if ($_SESSION['filter_value'] === 'interval') {
        $data_result = getCategoryByIntervalValue(
          $_SESSION['filter_column'],
          $_SESSION['sort_rule'],
          $_SESSION['filter_value_interval_min'],
          $_SESSION['filter_value_interval_max'],
          $_SESSION['page_num'],
          $page_size
        );
      }
      // END DATA FILTER

      $link_css_arr = array (
        '../public/css/admin/filter_form.css',
        '../public/css/admin/data_table.css',
      );
      $link_js_arr = array (
          '../public/js/admin/filter_form.js',
      );
      $view_link = 'v_product/v_product_overview.php';
      break;

    case 'add':
      $notification = '';
      
      // print_r($_POST['product_variant_size_list'][0]);

      // INSERT DATA
      if (
        isset($_POST['product_name']) &&
        isset($_POST['product_price']) &&
        isset($_POST['product_sale']) &&
        isset($_POST['product_category_id']) &&
        isset($_POST['product_brand_id']) &&
        isset($_POST['product_view_status']) &&
        isset($_POST['product_variant_color_id']) &&
        isset($_POST['product_variant_main_img']) &&
        isset($_POST['product_variant_sub_img_list']) &&
        isset($_POST['product_variant_size_list']) &&
        isset($_POST['product_variant_quantity_list'])
      ) {
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_sale = $_POST['product_sale'];
        $product_category_id = $_POST['product_category_id'];
        $product_brand_id = $_POST['product_brand_id'];
        $product_view_status = $_POST['product_view_status'];
        $product_variant_color_id = $_POST['product_variant_color_id'];
        $product_variant_main_img = $_POST['product_variant_main_img'];
        $product_variant_sub_img_list = $_POST['product_variant_sub_img_list'];
        $product_variant_size_list = $_POST['product_variant_size_list'];
        $product_variant_quantity_list = $_POST['product_variant_quantity_list'];

        // ************************************************************************************************
        // ************************************************************************************************
        // ************************************************************************************************
        // ************************************************************************************************
        // ************************************************************************************************
        function checkImg($img_file) {
          $check_img = getimagesize($_FILES['file_anh']['tmp_name']); // image real or fake
          $img_size = $_FILES['file_anh']['size']; 

          $check_img = false;
          if ($img_size > 2097152) {
            $notification = 'Vui lòng chọn ảnh có kích thước nhỏ hơn 2MB </br>';

          } elseif ($check_img == false) {
            $notification = 'Vui lòng kiểm tra hình ảnh được Upload có phải là ảnh thật hay không </br>';

          } else {
            $check_img = true;
          }

          return $check_img;
        }
        
        if (checkProductName($product_name) == false) {
          $notification = 'Sản phẩm có tên "'.$product_name.'" đã tồn tại </br>';

        } elseif (strlen($product_name) > 80 || strlen($product_name) === 0) {
          $notification = 'Vui lòng nhập tên sản phẩm ít hơn 32 ký tự </br>';

        } elseif (gettype($product_price) == 'integer') {
          $notification = 'Vui lòng nhập giá sản phẩm là số nguyên </br>';

        } elseif ($product_price < 1000 || $product_price > 1000000000) {
          $notification = 'Vui lòng nhập giá sản phẩm lớn hơn 1.000 và nhỏ hơn 1.000.000.000 </br>';

        } elseif (gettype($product_sale) == 'integer') {
          $notification = 'Vui lòng nhập phần trăm giảm giá là số nguyên </br>';

        } elseif ($product_sale < 0 || $product_sale > 100) {
          $notification = 'Vui lòng nhập phần trăm giảm giá lớn hơn 0 và nhỏ hơn 100 </br>';

        } else {
          // insertProduct(
          //   $category_name
          // );
        }
      }
      // END INSERT DATA

      // GET INFORMATION FOR PAGE
      $category_list = getProductCategory();
      $brand_list = getProductBrand();
      $color_list = getProductColor();
      // print_r($category_list);

      $link_css_arr = array (
        '../public/css/admin/interaction_form.css',
      );
      $link_js_arr = array (
          '../public/js/admin/preview_img.js',
          '../public/js/admin/preview_multiple_img.js',
          '../public/js/admin/control_sub_variant_quantity.js',
      );
      $view_link = 'v_product/v_product_add.php';
      break;

    case 'update':
      $notification = '';
      
      // UPDATE DATA
      if (
        isset($_GET['update_confirm']) && 
        isset($_GET['object_id']) &&
        isset($_GET['category_name'])
      ) {
        $category_name = $_GET['category_name'];
        
        if (checkCategoryName($category_name) == false) {
          $notification = 'Danh mục có tên "'.$category_name.'" đã tồn tại </br>';

        } elseif (strlen($category_name) > 32 || strlen($category_name) === 0) {
          $notification = 'Vui lòng nhập tên sản phẩm ít hơn 32 ký tự </br>';

        } else {
          $object_id = $_GET['object_id'];
          updateCategory(
            $object_id,
            $category_name
          );
        }
      }
      // END UPDATE DATA

      // GET DATA FOR UPDATE PAGE
      if (isset($_GET['object_id'])) {
        $object_id = $_GET['object_id'];

        $object_data = getCategoryDataById($object_id);

      } else {
        $object_data = '';
        $notification = 'Vui lòng truyền vào khóa chính để lấy thông tin của đối tượng </br>';
      }
      // END GET DATA FOR UPDATE PAGE

      $link_css_arr = array (
        '../public/css/admin/interaction_form.css',
      );
      $link_js_arr = '';
      $view_link = 'v_product/v_product_update.php';
      break;
  }
?>