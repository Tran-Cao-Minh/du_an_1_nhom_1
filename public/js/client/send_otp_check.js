$(document).ready(function () {

  $('.js-otp-check-match-btn').click(function () {
    let otpValue = $('.js-otp-check-match-input').val();

    $.ajax({
      url: '../ajax/ajax_otp_check.php',
      type: 'POST',
      dataType: 'html',
      data: {
        otpValue: otpValue,
      }
    }).done(function (data) {
      console.log(data);
      let notification = $('.js-otp-verify-message');

      if (data === 'wrongOtp') {
        notification.html('* Mã OTP không chính xác!');

      } else if (data === 'noOtp') {
        notification.html('* Mã OTP đã hết hiệu lực!')

      } else {
        const signUpBtnThree = document.querySelectorAll('.js-btn-sign-up-3');
        const overlay = document.querySelector('.overlay');
        const overlayThree = document.querySelector('.overlay-3');
        const overlayFour = document.querySelector('.overlay-4');
        const closeSignUpThree = document.querySelector(".js-sign-up-close-3");
    
        // Mở form đăng ký thành viên
        signUpBtnThree.forEach(signUp => {
            signUp.addEventListener('click', () => {
                overlay.classList.remove("overlay--active");
                overlayThree.classList.remove("overlay--active-3");
                overlayFour.classList.add("overlay--active-4");
            })
        })
    
        // Đóng form đăng ký thành viên
        closeSignUpThree.addEventListener('click', () => {
            overlayFour.classList.remove("overlay--active-4");
        })

      }
    })
  })



})