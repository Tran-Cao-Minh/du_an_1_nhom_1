$(document).ready(function () {
  $('.js-login-form-btn').click(function () {
    let loginButton = $(this);
    let accountValue = $('.js-account-login-form').val();
    let passwordValue = $('.js-password-login-form').val();

    $.ajax({
      url: '../ajax/ajax_login.php',
      type: 'POST',
      dataType: 'html',
      data: {
        accountValue: accountValue,
        passwordValue: passwordValue,
      }
    }).done(function (data) {
      let notification = $('.js-login-form-message');

      if (data === 'saitaikhoan') {
        notification.html('* Tài khoản không chính xác!');

      } else if (data === 'saimatkhau') {
        notification.html('* Mật khẩu không chính xác!');

      } else if (data === 'dungmatkhau') {
        location.reload(true);
      }
    })
  })




})