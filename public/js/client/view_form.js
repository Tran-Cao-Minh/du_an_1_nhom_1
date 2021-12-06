window.addEventListener('load', function () {
    const signInBtn = document.querySelector('.js-btn-sign-in');
    const signUpBtn = document.querySelector('.js-btn-sign-up-1');
    const signUpBtnTwo = document.querySelector('.js-btn-sign-up-2');
    const signUpBtnThree = document.querySelector('.js-btn-sign-up-3');

    const overlay = document.querySelector('.overlay');
    const overlayTwo = document.querySelector('.overlay-2');
    const overlayThree = document.querySelector('.overlay-3');
    const overlayFour = document.querySelector('.overlay-4');

    const closeSignIn = document.querySelector(".form__close");
    const closeSignUp = document.querySelector(".js-sign-up-close-1");
    const closeSignUpTwo = document.querySelector(".js-sign-up-close-2");
    const closeSignUpThree = document.querySelector(".js-sign-up-close-3");

    const inputPassword = document.querySelector("#form__password");
    const eyeToggle = document.querySelector(".js-show-password");
    const eyeSlash = document.querySelector(".fa-eye-slash");
    // Mở form đăng nhập
    signInBtn.addEventListener('click', (e) => {
        overlay.classList.add("overlay--active");
    })
    // Mở form đăng ký email
    signUpBtn.addEventListener('click', (e) => {
        overlayTwo.classList.add("overlay--active-2");
    })

    // Mở form xác thưc OTP
    signUpBtnTwo.addEventListener('click', (e) => {
        overlayTwo.classList.remove("overlay--active-2");
        overlayThree.classList.add("overlay--active-3");
    })

    // Mở form đăng ký thành viên
    signUpBtnThree.addEventListener('click', () => {
        overlayThree.classList.remove("overlay--active-3");
        overlayFour.classList.add("overlay--active-4");
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
    // // Ẩn hiện mật khẩu 
    // eyeToggle.addEventListener('click', () => {
    //     if (inputPassword.type === "password") {
    //         eyeSlash.classList.add("fa-eye")
    //         eyeSlash.classList.remove("fa-eye-slash")
    //         inputPassword.setAttribute("type", "text");
    //     } else {
    //         eyeSlash.classList.remove("fa-eye")
    //         eyeSlash.classList.add("fa-eye-slash")
    //         inputPassword.setAttribute("type", "password");
    //     }
    // })
})