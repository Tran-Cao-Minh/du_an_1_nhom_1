window.addEventListener('load', function () {
    // kiểm tra tên đăng nhập
    const inputAccountList = document.querySelectorAll(".js-account-input");

    inputAccountList.forEach(input => {
        input.addEventListener("blur", (e) => {
            let notification = input.parentElement.querySelector(".form__message");

            // kiểm tra giá trị
            if (input.value === "") {
                notification.innerHTML = '* Vui lòng nhập tài khoản của bạn!';

            } else if (/^\s/.test(input.value)) {
                notification.innerHTML = '* Tài khoản không được bắt đầu bằng dấu cách!';

            } else {
                notification.innerHTML = '';
            }

            //lưu dữ liệu vào sessionStorage
            sessionStorage.setItem("loginAccountValue", input.value);
        })
    });
})