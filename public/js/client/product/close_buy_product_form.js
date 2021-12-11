window.addEventListener('load', function () {
  const closeBuyProdBtn = document.querySelector('.js-close-buy-prod-btn')
  const overlayFive = document.querySelector('.overlay-5');

  closeBuyProdBtn.addEventListener('click', () => {
    overlayFive.classList.remove("overlay--active-5");
  })
})