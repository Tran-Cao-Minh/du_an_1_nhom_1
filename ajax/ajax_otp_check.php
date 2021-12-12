<?php 

  include '../global/connect_database.php';
  $conn = connectDatabase();

  $otp_value = $_POST['otpValue'];
  
  if (isset($_COOKIE['account_otp'])) {
    $account_otp = $_COOKIE['account_otp'];

    if ($otp_value != $account_otp) {
      $data = 'wrongOtp';
      echo $data;
      exit();
    }
    else {
      $data = 'correctOtp';
      echo $data;
      unset($_COOKIE['account_otp']);
      
    }

  } elseif (!isset($_COOKIE['account_otp'])) {
    $data = "noOtp";
    echo $data;
    $conn = null;
  }

?>