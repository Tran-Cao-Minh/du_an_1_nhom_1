window.addEventListener('load', function () {
    const inputOtpList = document.querySelectorAll(".js-otp-input");

    inputOtpList.forEach(input => {
        input.addEventListener("blur", (e) => {
            let notification = input.parentElement.querySelector(".form__message");

            if (input.value === "") {
                notification.innerHTML = '* Vui lòng nhập mã xác nhận!';

            } else if (input.value.length > 6) {
                notification.innerHTML = '* Mã xác nhận quá dài!'
            } else {
                notification.innerHTML = '';
            }
        })
    });

})