window.addEventListener('load', function () {
    const signInBtn = document.querySelector('.js-btn-sign-in');
    const signUpBtn = document.querySelectorAll('.js-btn-sign-up-1');
    const signUpBtnTwo = document.querySelectorAll('.js-btn-sign-up-2');
    const signUpBtnThree = document.querySelectorAll('.js-btn-sign-up-3');

    const buyProdBtn = document.querySelectorAll('.js-buy-prod-btn');
    const closeBuyProdBtn = document.querySelector('.js-close-buy-prod-btn')

    const overlay = document.querySelector('.overlay');
    const overlayTwo = document.querySelector('.overlay-2');
    const overlayThree = document.querySelector('.overlay-3');
    const overlayFour = document.querySelector('.overlay-4');
    const overlayFive = document.querySelector('.overlay-5');

    const closeSignIn = document.querySelector(".form__close");
    const closeSignUp = document.querySelector(".js-sign-up-close-1");
    const closeSignUpTwo = document.querySelector(".js-sign-up-close-2");
    const closeSignUpThree = document.querySelector(".js-sign-up-close-3");

    // Mở form đăng nhập
    signInBtn.addEventListener('click', (e) => {
        overlay.classList.add("overlay--active");
    })
    // Mở form đăng ký email
    signUpBtn.forEach(signUp => {
        signUp.addEventListener('click', (e) => {
            overlayTwo.classList.add("overlay--active-2");
        })
    })

    // Mở form xác thưc OTP
    signUpBtnTwo.forEach(signUp => {
        signUp.addEventListener('click', (e) => {
            overlayTwo.classList.remove("overlay--active-2");
            overlayThree.classList.add("overlay--active-3");
        })
    })

    // Mở form đăng ký thành viên
    signUpBtnThree.forEach(signUp => {
        signUp.addEventListener('click', () => {
            overlay.classList.remove("overlay--active");
            overlayThree.classList.remove("overlay--active-3");
            overlayFour.classList.add("overlay--active-4");
        })
    })

    // Đóng form đăng nhập
    closeSignIn.addEventListener('click', () => {
        overlay.classList.remove("overlay--active");
    })
    // Đóng form đăng ký
    closeSignUp.addEventListener('click', () => {
        overlayTwo.classList.remove("overlay--active-2");
    })

    // Đóng form otp
    closeSignUpTwo.addEventListener('click', () => {
        overlayThree.classList.remove("overlay--active-3");
    })

    // Đóng form đăng ký thành viên
    closeSignUpThree.addEventListener('click', () => {
        overlayFour.classList.remove("overlay--active-4");
    })

    // Mở popup mua sản phẩm
    buyProdBtn.forEach(btn => {
        btn.addEventListener('click', () => {
            overlayFive.classList.add("overlay--active-5");
        })
    })

    // Đóng popup mua sản phẩm
    closeBuyProdBtn.addEventListener('click', () => {
        overlayFive.classList.remove("overlay--active-5");
    })
})