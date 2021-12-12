$(document).ready(function () {
  $('.js-sign-up-check-btn').click(function () {
    let emailValue = $('.js-email-check-php').val();
    let nameValue = $('.js-name-check-php').val();
    let dateValue = $('.js-date-check-php').val();
    let passwordValue = $('.js-password-check-php').val();
    let rePasswordValue = $('.js-re-password-check-php').val();
    let sexValue = $('.js-sex-input:checked').val();
    $.ajax({
      url: '../ajax/ajax_sign_up_validation.php',
      type: 'POST',
      dataType: 'html',
      data: {
        emailValue: emailValue,
        nameValue: nameValue,
        dateValue: dateValue,
        passwordValue: passwordValue,
        rePasswordValue: rePasswordValue,
        sexValue: sexValue,
      }
    }).done(function (data) {
      let notification1 = $('.js-email-sign-up-message');
      let notification2 = $('.js-name-sign-up-message');
      let notification3 = $('.js-date-sign-up-message');
      let notification4 = $('.js-password-sign-up-message');

      switch (data) {
        case 'Fail email':
          notification1.html('Vui lòng nhập Email !');
          break;
        case 'Fail name':
          notification2.html('Vui lòng nhập họ tên !');
          break;
        case 'Fail date':
          notification3.html('Vui lòng nhập ngày sinh !');
          break;
        case 'Fail password':
          notification4.html('Vui lòng nhập mật khẩu !');
          break;
        case 'Fail re_password':
          notification4.html('Vui lòng nhập lại mật khẩu !');
          break;
        case 'Success':
          alert('Đăng ký thành công vui lòng đăng nhập lại');
          $('.js-sign-up-check-btn').addClass('js-btn-sign-in');
          break;
        default:
          break;
      }
      console.log(data);
    })
  })

})