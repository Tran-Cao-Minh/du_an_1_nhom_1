window.addEventListener('load', function () {
    const signInBtn = document.querySelector('.js-btn-sign-in');
    const closeSignIn = document.querySelector(".form__close");
    const overlay = document.querySelector('.overlay');

    // Mở form đăng nhập
    signInBtn.addEventListener('click', () => {
        overlay.classList.add("overlay--active");
    })

    // Đóng form đăng nhập
    closeSignIn.addEventListener('click', () => {
        overlay.classList.remove("overlay--active");
    })
})