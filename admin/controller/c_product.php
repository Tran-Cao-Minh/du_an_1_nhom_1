<?php
  include_once 'model/m_product/m_product.php';
  include_once 'model/m_product/m_product_variant.php';
  include_once 'model/m_product/m_product_img.php';

  if (isset($_GET['view_name'])) {
    $_SESSION['view_name'] = $_GET['view_name'];

  } elseif (isset($_POST['view_name'])) {
    $_SESSION['view_name'] = $_POST['view_name'];

  } elseif (!isset($_SESSION['view_name'])) {
    $_SESSION['view_name'] = 'overview';
  }
  $view_name = $_SESSION['view_name'];

  switch ($view_name) {
    case 'overview':
      $notification = '';
      
      // DELETE DATA
      if (
        isset($_GET['delete_confirm']) && 
        isset($_GET['object_id']) &&
        isset($_GET['product_name'])
      ) {
        $object_id = $_GET['object_id'];
        $product_name = $_GET['product_name'];
        deleteProduct($object_id, $product_name);
      }
      // END DELETE DATA

      // UPDATE VIEW STATUS
      if (
        isset($_GET['change_view_status']) && 
        isset($_GET['object_id']) &&
        isset($_GET['product_name'])
      ) {
        $object_id = $_GET['object_id'];
        $product_name = $_GET['product_name'];
        $current_status = $_GET['change_view_status'];

        if ($current_status == 'true') {
          $view_status_id = 0;
        } else {
          $view_status_id = 1;
        }
        
        updateProductViewStatus(
          $product_id = $object_id,
          $view_status_id,
          $product_name
        );
      }
      // END UPDATE VIEW STATUS

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

        $_SESSION['filter_column'] = 'PkProduct_Id';
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
        $data_result = getProductByIdentifyValue (
          $_SESSION['filter_column'],
          $_SESSION['sort_rule'],
          $_SESSION['filter_value_identify'],
          $_SESSION['page_num'],
          $page_size
        );

      } else if ($_SESSION['filter_value'] === 'interval') {
        $data_result = getProductByIntervalValue (
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
      
      // INSERT DATA
      if (
        isset($_POST['insert_confirm']) &&
        isset($_POST['product_name']) &&
        isset($_POST['product_price']) &&
        isset($_POST['product_sale']) &&
        isset($_POST['product_category_id']) &&
        isset($_POST['product_brand_id']) &&
        isset($_POST['product_view_status']) &&
        isset($_POST['product_variant_color_id']) &&
        isset($_FILES['product_variant_main_img']) &&
        isset($_FILES['product_variant_sub_img_list']) &&
        isset($_POST['product_variant_size_list']) &&
        isset($_POST['product_variant_quantity_list'])
      ) {
        $product_name = $_POST['product_name'];
        $product_price = (int)$_POST['product_price'];
        $product_sale = (int)$_POST['product_sale'];
        $product_category_id = $_POST['product_category_id'];
        $product_brand_id = $_POST['product_brand_id'];
        $product_view_status = (int)$_POST['product_view_status'];
        $product_variant_color_id = $_POST['product_variant_color_id'];
        $product_variant_main_img = $_FILES['product_variant_main_img'];
        $product_variant_sub_img_list = $_FILES['product_variant_sub_img_list'];
        $product_variant_size_list = $_POST['product_variant_size_list'];
        $product_variant_quantity_list = $_POST['product_variant_quantity_list'];

        include_once '../global/function/check_img.php';
        $check_img = checkImg($product_variant_main_img, '');
        $product_variant_sub_img_quantity = count($product_variant_sub_img_list['name']); // array of FILES always equal to 5 
        for ($i = 0; $i < $product_variant_sub_img_quantity; $i++) {
          if ($check_img == false) {
            break;
          }
          $check_img = checkImg($product_variant_sub_img_list, $i);
        }

        $check_product_variant_size = true;
        foreach ($product_variant_size_list as $product_variant_size) {
          $product_variant_size = (int)$product_variant_size;
          if ($product_variant_size < 1 || $product_variant_size > 99) {
            $check_product_variant_size = false;
            $notification = 'Vui nhập kích thước biến thể trong phạm vi từ 1 đến 99 </br>';
            break;
          }
        }
        $check_product_variant_quantity = true;
        foreach ($product_variant_quantity_list as $product_variant_quantity) {
          $product_variant_quantity = (int)$product_variant_quantity;
          if ($product_variant_quantity < 0 || $product_variant_quantity > 1000000000) {
            $check_product_variant_quantity = false;
            $notification = 'Vui nhập số lượng biến thể trong phạm vi từ 0 đến 1.000.000.000 </br>';
            break;
          }
        }

        include_once '../global/function/check_duplicate.php';

        if (checkProductName($product_name) == false) {
          $notification = 'Sản phẩm có tên "'.$product_name.'" đã tồn tại </br>';

        } elseif (strlen($product_name) > 80 || strlen($product_name) === 0) {
          $notification = 'Vui lòng nhập tên sản phẩm ít hơn 32 ký tự </br>';

        } elseif ($product_price < 1000 || $product_price > 1000000000) {
          $notification = 'Vui lòng nhập giá sản phẩm lớn hơn 1.000 và nhỏ hơn 1.000.000.000 </br>';

        } elseif ($product_sale < 0 || $product_sale > 100) {
          $notification = 'Vui lòng nhập phần trăm giảm giá lớn hơn 0 và nhỏ hơn 100 </br>';

        } elseif ($product_variant_sub_img_quantity < 4 || $product_variant_sub_img_quantity > 10) {
          $notification = 'Vui lòng chỉ chọn 4 đến 10 ảnh phụ </br>';

        } elseif (checkDuplicateValue($product_variant_size_list) == false) {
          $notification = 'Vui lòng không nhập kích thước các biến thể trùng nhau </br>';

        } elseif (count($product_variant_size_list) != count($product_variant_quantity_list)) {
          $notification = 'Số lượng các kích thước biến thể và số lượng biến thể phải bằng nhau </br>';

        } elseif (
          $check_img == true &&
          $check_product_variant_size == true &&
          $check_product_variant_quantity == true
        ) {
          insertProduct (
            $product_name,
            $product_price,
            $product_sale,
            $product_category_id,
            $product_brand_id,
            $product_view_status
          );

          $product_variant_quantity_by_color = count($product_variant_size_list);
          $product_id = insertProductVariant (
            $product_id = '',
            $product_name,
            $product_variant_color_id,
            $product_variant_main_img,
            $product_variant_sub_img_list,
            $product_variant_sub_img_quantity,
            $product_variant_size_list,
            $product_variant_quantity_list,
            $product_variant_quantity_by_color
          );
        }
      }
      // END INSERT DATA

      // GET INFORMATION FOR PAGE
      $category_list = getProductCategory();
      $brand_list = getProductBrand();
      $color_list = getProductColor();

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

    case 'add_variant':
      $notification = '';
      
      // INSERT DATA
      if (
        isset($_POST['insert_confirm']) &&
        isset($_POST['product_id']) &&
        isset($_POST['product_variant_color_id']) &&
        isset($_FILES['product_variant_main_img']) &&
        isset($_FILES['product_variant_sub_img_list']) &&
        isset($_POST['product_variant_size_list']) &&
        isset($_POST['product_variant_quantity_list'])
      ) {
        $product_id = $_POST['product_id'];
        $product_variant_color_id = $_POST['product_variant_color_id'];
        $product_variant_main_img = $_FILES['product_variant_main_img'];
        $product_variant_sub_img_list = $_FILES['product_variant_sub_img_list'];
        $product_variant_size_list = $_POST['product_variant_size_list'];
        $product_variant_quantity_list = $_POST['product_variant_quantity_list'];

        include_once '../global/function/check_img.php';
        $check_img = checkImg($product_variant_main_img, '');
        $product_variant_sub_img_quantity = count($product_variant_sub_img_list['name']); // array of FILES always equal to 5 
        for ($i = 0; $i < $product_variant_sub_img_quantity; $i++) {
          if ($check_img == false) {
            break;
          }
          $check_img = checkImg($product_variant_sub_img_list, $i);
        }

        $check_product_variant_size = true;
        foreach ($product_variant_size_list as $product_variant_size) {
          $product_variant_size = (int)$product_variant_size;
          if ($product_variant_size < 1 || $product_variant_size > 99) {
            $check_product_variant_size = false;
            $notification = 'Vui nhập kích thước biến thể trong phạm vi từ 1 đến 99 </br>';
            break;
          }
        }
        $check_product_variant_quantity = true;
        foreach ($product_variant_quantity_list as $product_variant_quantity) {
          $product_variant_quantity = (int)$product_variant_quantity;
          if ($product_variant_quantity < 0 || $product_variant_quantity > 1000000000) {
            $check_product_variant_quantity = false;
            $notification = 'Vui nhập số lượng biến thể trong phạm vi từ 0 đến 1.000.000.000 </br>';
            break;
          }
        }

        include_once '../global/function/check_duplicate.php';

        if (checkProduct($product_id) == false) {
          $notification = 'Có thể sản phẩm đã bị xóa trước khi thêm biến thể </br>';

        } elseif (checkProductVariant($product_id, $product_variant_color_id) == true) {
          $product_color = getColorNameById($product_variant_color_id);
          $notification = 'Biến thể sản phẩm với màu "'.$product_color.'" đã tồn tại</br>';

        } elseif ($product_variant_sub_img_quantity < 4 || $product_variant_sub_img_quantity > 10) {
          $notification = 'Vui lòng chỉ chọn 4 đến 10 ảnh phụ </br>';

        } elseif (checkDuplicateValue($product_variant_size_list) == false) {
          $notification = 'Vui lòng không nhập kích thước các biến thể trùng nhau </br>';

        } elseif (count($product_variant_size_list) != count($product_variant_quantity_list)) {
          $notification = 'Số lượng các kích thước biến thể và số lượng biến thể phải bằng nhau </br>';

        } elseif (
          $check_img == true &&
          $check_product_variant_size == true &&
          $check_product_variant_quantity == true
        ) {
          $product_variant_quantity_by_color = count($product_variant_size_list);
          insertProductVariant (
            $product_id,
            $product_name = '',
            $product_variant_color_id,
            $product_variant_main_img,
            $product_variant_sub_img_list,
            $product_variant_sub_img_quantity,
            $product_variant_size_list,
            $product_variant_quantity_list,
            $product_variant_quantity_by_color
          );

          $product_color = getColorNameById($product_variant_color_id);
          $notification = 'Thêm biến thể sản phẩm với màu "'.$product_color.'" thành công';
        }
      }
      // END INSERT DATA

      // GET INFORMATION FOR PAGE
      if (isset($_GET['product_id'])) {
        $object_id = $_GET['product_id'];
        $product_data = getProductDataById($object_id);
        if ($product_data != '') {
          $product_type = getProductTypeById($object_id);
          $product_brand = getProductBrandById($object_id);
          $product_choosen_color_list = getProductChoosenColor($object_id);
          $productNotChoosenColorList = getProductNotChoosenColor($object_id);
        }

      } elseif (isset($_POST['product_id'])) {
        $object_id = $_POST['product_id'];
        $product_data = getProductDataById($object_id);
        if ($product_data != '') {
          $product_type = getProductTypeById($object_id);
          $product_brand = getProductBrandById($object_id);
          $product_choosen_color_list = getProductChoosenColor($object_id);
          $productNotChoosenColorList = getProductNotChoosenColor($object_id);
        }

      } else {
        $product_data = '';
      }

      $link_css_arr = array (
        '../public/css/admin/interaction_form.css',
      );
      $link_js_arr = array (
          '../public/js/admin/preview_img.js',
          '../public/js/admin/preview_multiple_img.js',
          '../public/js/admin/control_sub_variant_quantity.js',
      );
      $view_link = 'v_product/v_product_add_variant.php';
      break;

    case 'update':
      $notification = '';
      
      // UPDATE PRODUCT DATA
      if (
        !isset($_POST['update_variant_confirm']) && 
        !isset($_POST['delete_variant_confirm']) && 
        isset($_GET['update_product_confirm']) && 
        isset($_GET['object_id']) &&
        isset($_GET['product_old_name']) &&
        isset($_GET['product_name']) &&
        isset($_GET['product_category_id']) &&
        isset($_GET['product_brand_id']) &&
        isset($_GET['product_price']) &&
        isset($_GET['product_sale']) &&
        isset($_GET['product_view_status'])
      ) {
        $object_id = $_GET['object_id'];
        $product_old_name = $_GET['product_old_name'];
        $product_name = $_GET['product_name'];
        $product_category_id = $_GET['product_category_id'];
        $product_brand_id = $_GET['product_brand_id'];
        $product_price = $_GET['product_price'];
        $product_sale = $_GET['product_sale'];
        $product_view_status = $_GET['product_view_status'];       

        if ($product_old_name == $product_name) {
          $check_product_name = true;

        } else {
          $check_product_name = checkProductName($product_name);
        }
        
        if ($check_product_name == false) {
          $notification = 'Sản phẩm có tên "'.$product_name.'" đã tồn tại </br>';
        
        } elseif (strlen($product_name) > 80 || strlen($product_name) === 0) {
          $notification = 'Vui lòng nhập tên sản phẩm ít hơn 32 ký tự </br>';

        } elseif ($product_price < 1000 || $product_price > 1000000000) {
          $notification = 'Vui lòng nhập giá sản phẩm lớn hơn 1.000 và nhỏ hơn 1.000.000.000 </br>';

        } elseif ($product_sale < 0 || $product_sale > 100) {
          $notification = 'Vui lòng nhập phần trăm giảm giá lớn hơn 0 và nhỏ hơn 100 </br>';

        } else {
          updateProduct(
            $object_id,
            $product_name,
            $product_category_id,
            $product_brand_id,
            $product_price,
            $product_sale,
            $product_view_status
          );
        }
      }
      // END UPDATE PRODUCT DATA

      // UPDATE PRODUCT VARIANT DATA
      if (
        isset($_POST['update_variant_confirm']) && 
        isset($_POST['object_id']) &&
        isset($_POST['product_variant_color_id']) &&
        isset($_POST['product_variant_size_list']) &&
        isset($_POST['product_variant_quantity_list']) &&
        isset($_POST['product_variant_main_img_id'])
      ) {
        $object_id = $_POST['object_id'];
        $product_variant_color_id = $_POST['product_variant_color_id'];
        $product_variant_size_list = $_POST['product_variant_size_list'];
        $product_variant_quantity_list = $_POST['product_variant_quantity_list'];
        $check_img = true;
        
        // check inf before update
        if (
          $_FILES['product_variant_main_img']['name'] != '' ||
          $_FILES['product_variant_sub_img_list']['name'][0] != ''
        ) {
          include_once '../global/function/check_img.php';

          if ($_FILES['product_variant_main_img']['name'] != '') {
            $product_variant_main_img = $_FILES['product_variant_main_img'];

            $check_img = checkImg($product_variant_main_img, '');
          }

          if ($_FILES['product_variant_sub_img_list']['name'][0] != '') {
            $product_variant_sub_img_list = $_FILES['product_variant_sub_img_list'];

            $product_variant_sub_img_quantity = count($product_variant_sub_img_list['name']); // array of FILES always equal to 5 
            for ($i = 0; $i < $product_variant_sub_img_quantity; $i++) {
              if ($check_img == false) {
                break;
              }
              $check_img = checkImg($product_variant_sub_img_list, $i);
            }
          }
        }

        $sub_img_quantity = 0;
        if (isset($_POST['sub_img_uploaded'])) {
          $sub_img_quantity += count($_POST['sub_img_uploaded']);
        }
        if (isset($product_variant_sub_img_quantity)) {
          $sub_img_quantity += $product_variant_sub_img_quantity;
        }
        if ($sub_img_quantity < 4 || $sub_img_quantity > 10) {
          $notification = 'Vui lòng chọn 4 đến 10 ảnh phụ </br>';
          $check_img = false;
        }

        $check_product_variant_size = true;
        foreach ($product_variant_size_list as $product_variant_size) {
          $product_variant_size = (int)$product_variant_size;
          if ($product_variant_size < 1 || $product_variant_size > 99) {
            $check_product_variant_size = false;
            $notification = 'Vui nhập kích thước biến thể trong phạm vi từ 1 đến 99 </>';
            break;
          }
        }
        
        $check_product_variant_quantity = true;
        foreach ($product_variant_quantity_list as $product_variant_quantity) {
          $product_variant_quantity = (int)$product_variant_quantity;
          if ($product_variant_quantity < 0 || $product_variant_quantity > 1000000000) {
            $check_product_variant_quantity = false;
            $notification = 'Vui nhập số lượng biến thể trong phạm vi từ 0 đến 1.000.000.000 </>';
            break;
          }
        }

        include_once '../global/function/check_duplicate.php';

        if (checkDuplicateValue($product_variant_size_list) == false) {
          $notification = 'Vui lòng không nhập kích thước các biến thể trùng nhau </br>';

        } elseif (count($product_variant_size_list) != count($product_variant_quantity_list)) {
          $notification = 'Số lượng các kích thước biến thể và số lượng biến thể phải bằng nhau </br>';

        } elseif (
          $check_img == true &&
          $check_product_variant_size == true &&
          $check_product_variant_quantity == true
        ) {
          // update product variant
          if (isset($product_variant_main_img)) {
            $product_variant_main_img_id = $_POST['product_variant_main_img_id'];
            updateProductVariantMainImage (
              $product_id = $object_id,
              $product_variant_main_img_id,
              $product_variant_main_img
            );
          }

          $product_variant_sub_img_id_list = getProductSubImgIdList (
            $product_id = $object_id,
            $product_variant_color_id
          );
          if ($product_variant_sub_img_id_list != '') {
            // delete first main img id
            array_shift($product_variant_sub_img_id_list);
            // delete sub img uploaded
            if (!isset($_POST['sub_img_uploaded'])) {
              foreach ($product_variant_sub_img_id_list as $sub_img_id) {
                deleteProductVariantSubImage($sub_img_id['PkImage_Id']);
              }
            } else {
              $sub_img_uploaded_id_list = $_POST['sub_img_uploaded'];

              foreach ($product_variant_sub_img_id_list as $sub_img_id) {
                $check_delete = true;
                foreach ($sub_img_uploaded_id_list as $sub_img_uploaded_id) {
                  if ($sub_img_id['PkImage_Id'] == $sub_img_uploaded_id) {
                    $check_delete = false;
                    break;
                  }
                }
                if ($check_delete == true) {
                  deleteProductVariantSubImage($sub_img_id['PkImage_Id']);
                }
              }
            }
            // insert sub image
            if (isset($product_variant_sub_img_list)) {
              insertProductVariantImg(
                $product_id = $object_id,
                $product_variant_color_id,
                $product_variant_sub_img_list,
                $product_variant_sub_img_quantity
              );
            }
          } else {
            $notification = 'Lỗi truy cập các hình ảnh phụ với mã sản phẩm là "'.$object_id.'" '
                          . 'và mã màu là "'.$product_variant_color_id.'" </br>';
          }

          $product_variant_size_list_in_db = getProductVariantSizeList (
            $product_id = $object_id,
            $product_variant_color_id
          );
          if ($product_variant_size_list_in_db != '') {
            // delete sub variant
            foreach ($product_variant_size_list_in_db as $size_in_db) {
              $check_delete = true;
              foreach ($product_variant_size_list as $size) {
                if ($size_in_db['ProductSize'] == $size) {
                  $check_delete = false;
                  break;
                }
              }
              if ($check_delete == true) {
                deleteProductSubVariant(
                  $product_id = $object_id,
                  $product_variant_color_id,
                  $size = $size_in_db['ProductSize']
                );
              }
            }
            // update, insert sub variant
            $i = 0;
            foreach ($product_variant_size_list as $size) {
              $check_exist = false;
              foreach ($product_variant_size_list_in_db as $size_in_db) {
                if ($size == $size_in_db['ProductSize']) {
                  $check_exist = true;
                  break;
                }
              }
              if ($check_exist == true) {
                updateProductSubVariant(
                  $product_id = $object_id,
                  $product_variant_color_id,
                  $size,
                  $quantity = $product_variant_quantity_list[$i]
                );
              } else {
                insertProductSubVariant(
                  $product_id = $object_id,
                  $product_variant_color_id,
                  $size,
                  $quantity = $product_variant_quantity_list[$i]
                );
              }
              $i++;
            }

            if ($notification == '') {
              $notification = 'Sửa biến thể sản phẩm thành công </br>';
            }
          } else {
            $notification = 'Lỗi truy cập các biến thể với mã sản phẩm là "'.$object_id.'" '
                          . 'và mã màu là "'.$product_variant_color_id.'" </br>';
          }
        }
      }
      // END UPDATE PRODUCT VARIANT DATA

      // DELETE PRODUCT VARIANT DATA
      if (
        isset($_POST['delete_variant_confirm']) && 
        isset($_POST['object_id']) &&
        isset($_POST['product_variant_color_id'])
      ) {
        $delete_variant_confirm = $_POST['delete_variant_confirm'];
        $object_id = $_POST['object_id'];
        $product_variant_color_id = $_POST['product_variant_color_id'];

        $next_product_variant_color_id = getNextVariantProductColorId (
          $product_id = $object_id, 
          $product_variant_color_id
        );

        if ($next_product_variant_color_id == '') {
          $notification = 'Sản phẩm phải có ít nhất một biến thể để tồn tại </br>';

        } else {
          $check_delete = deleteProductVariant(
            $product_id = $object_id, 
            $product_variant_color_id
          );

          if ($check_delete == true) {
            $notification = 'Xóa biến thể với mã màu là "'.$product_variant_color_id.'" thành công </br>';
            $_POST['product_variant_color_id'] = $next_product_variant_color_id['FkColor_Id'];
          }
        }
      }
      // END DELETE PRODUCT VARIANT DATA

      // GET DATA FOR UPDATE PAGE
      if (isset($_GET['object_id'])) {
        $product_id = $_GET['object_id'];

        $product_data = getProductDataById($product_id);

        if ($product_data != '') {
          $category_list = getProductCategory();
          $brand_list = getProductBrand();
          $product_choosen_color_list = getProductChoosenColor($product_id);
        }

      } elseif (isset($_POST['object_id'])) {
        $product_id = $_POST['object_id'];

        $product_data = getProductDataById($product_id);

        if ($product_data != '') {
          $category_list = getProductCategory();
          $brand_list = getProductBrand();
          $product_choosen_color_list = getProductChoosenColor($product_id);
        }

      } else {
        $product_data = '';
        $notification = 'Vui lòng truyền vào khóa chính để lấy thông tin của đối tượng </br>';
      }
      // END GET DATA FOR UPDATE PAGE

      $link_css_arr = array (
        '../public/css/admin/interaction_form.css',
        '../public/css/admin/update_product_form.css',
      );
      $link_js_arr = array (
        '../public/js/admin/preview_img.js',
        '../public/js/admin/preview_multiple_img.js',
        '../public/js/admin/control_sub_variant_quantity.js',
        '../public/js/admin/delete_img_update_product.js',
        '../public/js/admin/open_variant_form.js',
      );
      $view_link = 'v_product/v_product_update.php';
      break;
  }
?>