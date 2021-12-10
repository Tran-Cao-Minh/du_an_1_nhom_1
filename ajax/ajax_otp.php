<?php
  include '../global/function/send_mail.php';

  $servername = "localhost:3325";
  $username = "root";
  $password = "";
  
  try {
    $conn = new PDO("mysql:host=$servername;dbname=ignite_shop", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }


  $email_value = $_POST["emailValue"];
  $account_otp = rand(100000, 999999);
  
  setcookie('account_otp', $account_otp, time() + (60*5), '/');

  $send_mail_result = sendMail (
    $recipient_email = $email_value, 
    $recipient_name = 'Maeve',
    $email_subject = 'Gửi mã xác nhận đến khách hàng',  
    $email_content = 'Mã xác nhận của bạn là: '.$account_otp.' '
  );

  if ($send_mail_result == true) {
    echo "Mail sent successfully";

  } else {
    echo "Mail failed: " . $send_mail_result;
  }

  































?>