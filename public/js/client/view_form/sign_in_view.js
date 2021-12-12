window.addEventListener('load', function () {
  const signInBtn = document.querySelectorAll('.js-btn-sign-in');
  const closeSignIn = document.querySelector(".form__close");
  const overlay = document.querySelector('.overlay');
  const overlayFour = document.querySelector('.overlay-4');

  signInBtn.forEach(btn => {
    // Mở form đăng nhập
    btn.addEventListener('click', () => {
      overlayFour.classList.remove("overlay--active-4");
      overlay.classList.add("overlay--active");
    })
  })

  // Đóng form đăng nhập
  closeSignIn.addEventListener('click', () => {
    overlay.classList.remove("overlay--active");
  })
})