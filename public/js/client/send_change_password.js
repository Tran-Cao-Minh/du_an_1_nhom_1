$(document).ready(function () {
  $('.js-change-password-button').on('click', function () {
      let oldPasswordValue = $('.js-change-password-old').val();
      let newPasswordValue = $('.js-change-password-new').val();
      
          $.ajax({
              url: '../ajax/ajax_change_password.php',
              type: 'POST',
              dataType: 'html',
              data: {
                  oldPasswordValue: oldPasswordValue,
                  newPasswordValue: newPasswordValue,
              }
          }).done(function (output) {
            console.log(output);
            if (output === 'ChangePassSuccess') {
              alert('Thay đổi mật khẩu thành công');
            } else {
              alert('Thành công vui lòng đăng nhập lại');
            }
          })
  })
})