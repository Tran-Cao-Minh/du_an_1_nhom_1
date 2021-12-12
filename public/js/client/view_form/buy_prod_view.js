window.addEventListener('load', function () {
  const overlayFive = document.querySelector('.overlay-5');
  const buyProdBtn = document.querySelectorAll('.js-buy-prod-btn');
  const closeProdForm = document.querySelector(".form__close");

  buyProdBtn.forEach(btn => {
    // Mở form đăng nhập
    btn.addEventListener('click', () => {
      overlayFive.classList.add("overlay--active-5");
    })
  })

  // Đóng form đăng nhập
  closeProdForm.addEventListener('click', () => {
    overlayFive.classList.remove("overlay--active-5");
  })
})