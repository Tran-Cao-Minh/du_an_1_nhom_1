window.addEventListener('load', function () {
    const logInBtn = document.querySelector('.header__user-btn');
    const overlay = document.querySelector('.overlay');
    const closeFormIcon = document.querySelector(".form__close");
    const inputPassword = document.querySelector("#form__password");
    const eyeToggle = document.querySelector(".form__password__icon");
    const eyeSlash = document.querySelector(".fa-eye-slash");
    // Open form
    logInBtn.addEventListener('click', () => {
        overlay.classList.add("overlay--active");
    })
    // Close form
    closeFormIcon.addEventListener('click', () => {
        overlay.classList.remove("overlay--active");
    })

    // // Hide/show pass 
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