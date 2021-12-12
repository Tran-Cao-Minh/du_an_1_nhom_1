<?php

include '../global/connect_database.php';

    $email_value = $_POST["emailValue"];
    $name_value = $_POST["nameValue"];
    $date_value = $_POST["dateValue"];
    $password_value = $_POST["passwordValue"];
    $re_password_value = $_POST["rePasswordValue"];
    $sex_value = $_POST["sexValue"];

   if (empty($email_value)){
     echo "Fail email";
     exit();
  }

  if (empty($name_value)) {
    echo "Fail name";
    exit();
  }

  if (empty($date_value)){
    echo "Fail date";
    exit();
 }
  
  if (empty($password_value)) {
    echo "Fail password";
    exit();
  } 

  if (empty($re_password_value)) {
    echo "Fail re_password";
    exit();
  } 
  
  $sql = "INSERT INTO `customer` 
              (`CustomerName`, `CustomerDate`, `CustomerEmail`, `CustomerSex`)
           VALUES 
              ('$name_value', '$date_value', '$email_value', '$sex_value')";
              
  $insert_result = $conn->exec($sql);

  if ($insert_result === 1) {
    echo "";
    $sql = "SELECT `PkCustomer_Id`
           FROM `customer` 
           WHERE `CustomerEmail` = '$email_value'";

    $data_result = $conn->query($sql);
    $account_id = $data_result->fetchColumn();
    $account_password = $password_value;
    $encode_account_password = md5($account_password);

    $sql = "INSERT INTO `account` 
                (
                  `FkCustomer_Id`, 
                  `AccountRole`, 
                  `AccountPassword`, 
                  `AccountDate`, 
                  `AccountStatus`
                )
              VALUES 
                (
                  '$account_id', 
                  '0', 
                  '$encode_account_password', 
                  CURRENT_DATE(),
                  '1'
                )
              ";
      $insert_result = $conn->exec($sql);

      if ($insert_result === 1) { 
        echo "Success";
      }
  } else {
    echo "Failed";
  }
  
  $conn = null;


?>