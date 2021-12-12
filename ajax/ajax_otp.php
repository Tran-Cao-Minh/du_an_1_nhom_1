<?php
  include '../global/function/send_mail.php';

  include '../global/connect_database.php';


  $email_value = $_POST["emailValue"];
  $account_otp = rand(100000, 999999);
  
  setcookie('account_otp', $account_otp, time() + (60*5), '/');

  $send_mail_result = sendMail (
    $recipient_email = $email_value, 
    $recipient_name = 'Maeve',
    $email_subject = 'Gửi mã xác nhận đến khách hàng',  
    $email_content = 'Mã xác nhận của bạn là: '.$account_otp.'.Lưu ý ! sau 5 phút mã xác nhận này sẽ bị hủy !'
  );

  if ($send_mail_result == true) {
    echo "Mail sent successfully";

  } else {
    echo "Mail failed: " . $send_mail_result;
  }
  $conn = null;
  































?>