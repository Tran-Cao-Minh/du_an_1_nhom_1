<?php 

  $servername = "localhost:3325";
  $username = "root";
  $password = "";
  
  try {
    $conn = new PDO("mysql:host=$servername;dbname=ignite_shop", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

  $otp_value = $_POST['otpValue'];
  
  if (isset($_COOKIE['account_otp'])) {
    $account_otp = $_COOKIE['account_otp'];

    if ($otp_value != $account_otp) {
      $data = 'wrongOtp';
      echo $data;
      
    } else {
      $data = 'correctOtp';
      echo $data;
      unset($_COOKIE['account_otp']);
      
    }

  } elseif (!isset($_COOKIE['account_otp'])) {
    $data = "noOtp";
    echo $data;

  }

?>