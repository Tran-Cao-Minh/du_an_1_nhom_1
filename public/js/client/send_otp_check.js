$(document).ready(function () {
  $('.js-otp-check-match-btn').click(function () {
    let otpValue = $('.js-otp-check-match-input').val();

    $.ajax({
      url: '../ajax/ajax_otp_check.php',
      type: 'POST',
      dataType: 'html',
      data: {
          otpValue:otpValue,
      }
    }).done(function (data) {
      console.log(data);
    })
  })



})