window.addEventListener('load', function () {
    // kiểm tra mật khẩu
    const inputPasswordList = document.querySelectorAll(".js-password-input");

    inputPasswordList.forEach(input => {
        input.addEventListener("input", (e) => {
            let notification = input.parentElement.querySelector(".form__message");

            // kiểm tra giá trị
            if (input.value === "") {
                notification.innerHTML = '* Vui lòng nhập mật khẩu của bạn!';

            } else if (input.value.length < 4 || input.value.length > 32) {
                notification.innerHTML = '* Vui lòng nhập mật khẩu từ 4 đến 32 ký tự!'

            } else if (/[^0-9a-zA-Z]/.test(input.value)) {
                notification.innerHTML = "* Mật khẩu chỉ bao gồm chữ cái không dấu!";

            } else {
                notification.innerHTML = '';

            }

            //lưu dữ liệu vào sessionStorage
            sessionStorage.setItem("loginPasswordValue", input.value);
        })
    });

})