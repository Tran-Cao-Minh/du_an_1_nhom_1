<?php
  function checkImg($img_file, $index) {
    if ($index != '') {
      $real_img = getimagesize($img_file['tmp_name'][$index]);
      $img_size = $img_file['size'][$index]; 

    } else {
      $real_img = getimagesize($img_file['tmp_name']);
      $img_size = $img_file['size']; 
    }

    $check_img = false;
    if ($img_size > 2097152) {
      global $notification;
      $notification = 'Vui lòng chọn ảnh có kích thước nhỏ hơn 2MB </br>';

    } elseif ($real_img == false) {
      global $notification;
      $notification = 'Vui lòng kiểm tra hình ảnh được Upload có phải là ảnh thật hay không </br>';
      $notification .= 'Ảnh thật được chấp nhận thường có định dạng PNG hoặc JPG </br>';

    } else {
      $check_img = true;
    }

    return $check_img;
  }
?>