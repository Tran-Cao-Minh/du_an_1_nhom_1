<?php
  function sendMail (
    $recipient_email, 
    $recipient_name,
    $email_subject,  
    $email_content 
  ) {
    require '../library/PHPMailer-master/src/PHPMailer.php'; 
    require '../library/PHPMailer-master/src/SMTP.php';
    require '../library/PHPMailer-master/src/Exception.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);  //true: enables exceptions
    try {
      $mail->SMTPDebug = 0;
      $mail->isSMTP();  
      $mail->CharSet  = "utf-8";
      $mail->Host = 'smtp.gmail.com';  
      $mail->SMTPAuth = true;

      $sender_email = 'trancaominh932016a@gmail.com';
      $sender_password = 'trancaominh932016a@gmail';
      $sender_name = 'Shop bán giày cao cấp Ignite';
      $mail->Username = $sender_email;
      $mail->Password = $sender_password;  
      $mail->SMTPSecure = 'ssl'; 
      $mail->Port = 465;               
      $mail->setFrom($sender_email, $sender_name ); 

      $to = $recipient_email;
      $to_name = $recipient_name;
      $mail->addAddress($to, $to_name);  
      $mail->isHTML(true);
      $mail->Subject = $email_subject;      
      $mail->Body = $email_content;

      $mail->smtpConnect( array(
          "ssl" => array(
              "verify_peer" => false,
              "verify_peer_name" => false,
              "allow_self_signed" => true
          )
      ));
      $mail->send();

      return true;
    } catch (Exception $e) {
      return $mail->ErrorInfo;
    }
  }
?>