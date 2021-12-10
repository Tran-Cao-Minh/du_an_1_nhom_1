$(document).ready(function () {
  $('.js-otp-check-btn').click(function () {
    let emailValue = $('.js-email-input-check').val();

    $.ajax({
      url: '../ajax/ajax_otp.php',
      type: 'POST',
      dataType: 'html',
      data: {
          emailValue: emailValue,
      }
    }).done(function (data) {
      console.log(data);
    })
  })



})