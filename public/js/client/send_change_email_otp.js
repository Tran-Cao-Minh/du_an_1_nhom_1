$(document).ready(function () {

  $('.js-change-email-otp-check-match-btn').click(function () {
    let changeEmailOtp = $('.js-change-email-otp-check-match-input').val();
    $.ajax({
      url: '../ajax/ajax_change_email_otp_check.php',
      type: 'POST',
      dataType: 'html',
      data: {
        changeEmailOtp: changeEmailOtp,
      }
    }).done(function (data) {
      console.log(data);
      let notification = $('.js-change-email-otp-verify-message');

      if (data === 'wrongOtp') {
        notification.html('* Mã OTP không chính xác!');

      } else if (data === 'noOtp') {
        notification.html('* Mã OTP đã hết hiệu lực!')

      } else {

      }
    })
  })



})