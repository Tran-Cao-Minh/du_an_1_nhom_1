<?php 

  include '../global/connect_database.php';
  $conn = connectDatabase();

  $old_passwrord_value = $_POST['oldPasswordValue'];
  $new_passwrord_value = $_POST['newPasswordValue'];

  setcookie('new_password_value', $new_passwrord_value, time() + (60*1), '/');

  if (isset($_COOKIE['new_password_value'])) {
   $new_passwrord_value = $_COOKIE['new_password_value'];
   $encode_new_password_value = md5($new_passwrord_value);
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
    echo $sql;
  
    $sql = "UPDATE `account` 
            SET 
                `AccountPassword` = '$encode_new_password_value'
             WHERE `FkCustomer_Id` = '$account_id'";
    
    $update_result = $conn->exec($sql);
    if ($update_result === 1) { 
        echo "ChangePassSuccess";
      }
      echo $sql;
  }
  
?>