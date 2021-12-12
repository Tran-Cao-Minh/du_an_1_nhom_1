window.addEventListener('load', function () {
  const changeEmailOtpBtn = document.querySelectorAll('.js-change-email-otp-btn');
  const closeChangeEmailOtp = document.querySelector(".js-change-email-otp-close-btn");
  const overlaySeven = document.querySelector('.overlay-7');
  const overlaySix = document.querySelector('.overlay-6');
 
  changeEmailOtpBtn.forEach(btn => {
    btn.addEventListener('click', () => {
      overlaySix.classList.remove("overlay--active-6");
      overlaySeven.classList.add("overlay--active-7");
    })
  })

  closeChangeEmailOtp.addEventListener('click', () => {
    overlaySeven.classList.remove("overlay--active-7");
  })
})