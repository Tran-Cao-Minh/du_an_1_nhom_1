window.addEventListener('load', function () {
  const changePasswordBtn = document.querySelectorAll('.js-change-password-btn');
  const closeChangePassword = document.querySelector(".js-change-password-close-btn");
  const overlayEight = document.querySelector('.overlay-8');

  changePasswordBtn.forEach(btn => {
    btn.addEventListener('click', () => {
      overlayEight.classList.add("overlay--active-8");
    })
  })

  closeChangePassword.addEventListener('click', () => {
    overlayEight.classList.remove("overlay--active-8");
  })
})