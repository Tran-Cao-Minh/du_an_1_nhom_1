<div class="overlay-6">
  <section class="form">
    <form action="" class="form__register" method="post">
      <h2 class="form__heading">Thay đổi email</h2>
      <div class="form__group">
        <label class="form__label" for="">Email</label>
        <input name="change_email_input" class="form__input js-email-input form__input--primary" type="text"
          placeholder="Nhập email mới của bạn" />
        <span class="form__message"></span>
      </div>
      <!-- <div class="form__group">
        <label class="form__label" for="">Mã xác nhận</label>
        <input class="form__input form__input--primary" type="text" placeholder="Nhập mã xác nhận gồm 6 chứ số" />
        <span class="form__message"></span>
      </div> -->
      <div class="form__group form__group--flex mb2-5 ">
        <button class="form__button--small form__button-back" type="submit">Trở về</button>
        <button class="
        form__button--small 
        js-change-email-otp-btn
        form__button-accept" name="btn_change_email" type="submit">Xác nhận</button>
      </div>
      <!-- <div class="form__register__message">
        <p>Không nhận được?</p> <a href="">Gửi lại mã</a>
      </div> -->
    </form>
    <div class="form__close js-change-email-close-btn">
      <span class="form__close__icon"><i class="fas fa-times"></i> </span>
    </div>
  </section>
</div>
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
  
  if (isset($_POST["btn_change_email"])) {
    
  $email_value = $_POST["change_email_input"];
  $account_otp = rand(100000, 999999);
  
  setcookie('account_otp', $account_otp, time() + (60*5), '/');

  $send_mail_result = sendMail (
    $recipient_email = $email_value, 
    $recipient_name = 'Khách hàng',
    $email_subject = 'Gửi mã xác nhận đến khách hàng',  
    $email_content = 'Mã xác nhận của bạn là: '.$account_otp.'.Lưu ý ! sau 5 phút mã xác nhận này sẽ bị hủy !'
  );

  if ($send_mail_result == true) {
    echo "<script>console.log('Mail successfully' );</script>";

  } else {
    echo "<script>console.log('Mail failed' );</script>";
  }
      
  }


?>