<?php 

  include '../global/connect_database.php';
  $conn = connectDatabase();

  $change_email_value = $_POST['changeEmailOtp'];
  
  if (isset($_COOKIE['change_email_otp'])) {
    $change_email_otp = $_COOKIE['change_email_otp'];

    if ($change_email_otp != $change_email_value) {
      $data = 'wrongOtp';
      echo $data;
      exit();
    }
    else {
      $data = 'correctOtp';
      echo $data;
  
      unset($_COOKIE['change_email_otp']);
      
      if(isset($_COOKIE['new_email_value'])) {
          $new_email_value = $_COOKIE['new_email_value'];
          if (isset($_COOKIE['user_id'])) {
            $user_id = $_COOKIE['user_id'];
          }
          if (isset($_COOKIE['user_password'])) {
            $user_password = $_COOKIE['user_password'];
          }

      $sql = "SELECT `FkCustomer_Id`
      FROM `account` 
      WHERE `FkCustomer_Id` = '$user_id'
      AND `AccountPassword` = '$user_password' 
      LIMIT 1";
      
      $data_result = $conn->query($sql);
      $account_id = $data_result->fetch();
      $account_id = $account_id['FkCustomer_Id'];

      $sql = "UPDATE `customer` 
              SET 
                  `CustomerEmail` = '$new_email_value'
               WHERE `PkCustomer_Id` = '$account_id'";
               
      $update_result = $conn->exec($sql);
      if ($update_result === 1) { 
        echo "Success";
      }
  
      }
 
    }

  } elseif (!isset($_COOKIE['change_email_otp'])) {
    $data = "noOtp";
    echo $data;

  }

  $conn = null;





?>