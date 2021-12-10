window.addEventListener('load', function () {
    // check email đăng ký
    const inputEmailList = document.querySelectorAll(".js-email-input");
    let formBtn = document.querySelector(".js-btn-sign-up-2");

    // formBtn.disabled = true;

    inputEmailList.forEach(input => {
        input.addEventListener("blur", (e) => {
            let notification = input.parentElement.querySelector(".form__message");

            let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

            if (input.value === "") {
                notification.innerHTML = '* Vui lòng nhập email!';

            } else if (regexEmail.test(input.value)) {
                notification.innerHTML = '';
                // formBtn.disabled = false;

            } else {
                notification.innerHTML = '* Email không đúng định dạng';
            }
        })
    })
})