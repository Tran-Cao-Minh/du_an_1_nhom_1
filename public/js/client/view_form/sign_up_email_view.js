window.addEventListener('load', function () {
    const signUpBtn = document.querySelectorAll('.js-btn-sign-up-1');
    const overlayTwo = document.querySelector('.overlay-2');
    const closeSignUp = document.querySelector(".js-sign-up-close-1");

    // Mở form đăng ký email
    signUpBtn.forEach(signUp => {
        signUp.addEventListener('click', (e) => {
            overlayTwo.classList.add("overlay--active-2");
        })
    })

    // Đóng form đăng ký
    closeSignUp.addEventListener('click', () => {
        overlayTwo.classList.remove("overlay--active-2");
    })

})