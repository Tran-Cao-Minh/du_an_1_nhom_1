<?php
  include '../global/function/send_mail.php';

  include '../global/connect_database.php';
  $conn = connectDatabase();
    
  $email_value = $_POST["changeEmailValue"];
  $change_email_otp = rand(100000, 999999);
  
  setcookie('change_email_otp', $change_email_otp, time() + (60*5), '/');
  setcookie('new_email_value', $email_value, time() + (60*1), '/');

  $send_mail_result = sendMail (
    $recipient_email = $email_value, 
    $recipient_name = 'Khách hàng',
    $email_subject = 'Gửi mã xác nhận đến khách hàng',  
    $email_content = 'Mã xác nhận của bạn là: '.$change_email_otp.'.Lưu ý ! sau 5 phút mã xác nhận này sẽ bị hủy !'
  );

  if ($send_mail_result == true) {
    echo "<script>console.log('Mail successfully' );</script>";

  } else {
    echo "<script>console.log('Mail failed' );</script>";
  }
      
  $conn = null;

?>