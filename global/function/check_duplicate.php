<?php
  function checkDuplicateValue($array) {
    $check_array = array_count_values($array);
    $check_result = true;
    foreach ($check_array as $check_value) {
      if ($check_value > 1) {
        $check_result = false;
        break;
      }
    }

    return $check_result;
  }
?>