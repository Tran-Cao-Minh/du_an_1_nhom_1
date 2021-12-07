window.addEventListener('load', function () {
    const signUpBtnTwo = document.querySelectorAll('.js-btn-sign-up-2');
    const overlayThree = document.querySelector('.overlay-3');
    const closeSignUpTwo = document.querySelector(".js-sign-up-close-2");

    // Mở form xác thưc OTP
    signUpBtnTwo.forEach(signUp => {
        signUp.addEventListener('click', (e) => {
            overlayTwo.classList.remove("overlay--active-2");
            overlayThree.classList.add("overlay--active-3");
        })
    })

    // Đóng form otp
    closeSignUpTwo.addEventListener('click', () => {
        overlayThree.classList.remove("overlay--active-3");
    })

})