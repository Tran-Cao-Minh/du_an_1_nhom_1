window.addEventListener('load', function () {
  const changeEmailBtn = document.querySelectorAll('.js-change-email-btn');
  const closeChangeEmail = document.querySelector(".js-change-email-close-btn");
  const overlaySix = document.querySelector('.overlay-6');

  changeEmailBtn.forEach(btn => {
    btn.addEventListener('click', () => {
      overlaySix.classList.add("overlay--active-6");
    })
  })

  closeChangeEmail.addEventListener('click', () => {
    overlaySix.classList.remove("overlay--active-6");
  })
})