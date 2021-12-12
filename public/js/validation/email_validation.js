window.addEventListener('load', function () {
    // check email đăng ký
    const inputEmailList = document.querySelectorAll(".js-email-input");
    let formBtn = document.querySelector(".js-btn-sign-up-2");
    const changeEmailOtpBtn = document.querySelector('.js-change-email-otp-btn');

    formBtn.disabled = true;
    changeEmailOtpBtn.disabled = true;

    inputEmailList.forEach(input => {
        input.addEventListener("input", (e) => {
            let notification = input.parentElement.querySelector(".form__message");

            let regexEmail = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

            if (input.value === "") {
                notification.innerHTML = '* Vui lòng nhập email!';

            } else if (regexEmail.test(input.value)) {
                notification.innerHTML = '';
                formBtn.disabled = false;
                changeEmailOtpBtn.disabled = false;

            } else {
                notification.innerHTML = '* Email không đúng định dạng';
            }
        })
    })
})