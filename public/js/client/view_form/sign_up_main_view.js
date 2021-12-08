window.addEventListener('load', function () {
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
})