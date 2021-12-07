// KIỂM TRA FORM ĐĂNG NHẬP

// function checkLoginForm() {
//     // nếu sai thì chuyển sang button
//     if (ckLoginAccount === false || ckLoginPassword === false) {
//         document.querySelector(".js-form-btn")
//             .setAttribute("type", "button");

//     } else if (ckLoginAccount === true & ckLoginPassword === true) {
//         // nếu đúng thì chuyển sang submit
//         document.querySelector(".js-form-btn")
//             .setAttribute("type", "submit");
//     }
// }

// kiểm tra tên đăng nhập
let inputAccountList = document.querySelectorAll(".js-account-input");

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

// kiểm tra mật khẩu
let inputPasswordList = document.querySelectorAll(".js-password-input");

inputPasswordList.forEach(input => {
    input.addEventListener("blur", (e) => {
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

// END CHECK FORM ĐĂNG NHẬP

// CHECK FORM ĐĂNG KÝ

// check email đăng ký
let inputEmailList = document.querySelectorAll(".js-email-input");

inputEmailList.forEach(input => {
    input.addEventListener("blur", (e) => {
        let notification = input.parentElement.querySelector(".form__message");

        let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

        if (input.value === "") {
            notification.innerHTML = '* Vui lòng nhập email!';

        } else if (regexEmail.test(input.value)) {
            notification.innerHTML = '';

        } else {
            notification.innerHTML = '* Email không đúng định dạng';
        }
    })
})

let inputOtpList = document.querySelectorAll(".js-otp-input");

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

// check họ tên
let inputNameList = document.querySelectorAll(".js-name-input");

inputNameList.forEach(input => {
    input.addEventListener("blur", (e) => {
        let notification = input.parentElement.querySelector(".form__message");

        if (input.value === "") {
            notification.innerHTML = '* Vui lòng nhập họ tên của bạn!';

        } else if (input.value > 32) {
            notification.innerHTML = '* Họ tên của bạn quá dài!';
            
        } else {
            notification.innerHTML = '';
        }
    })
});

// check ngày sinh
let inputDateList = document.querySelectorAll(".js-date-input");

inputDateList.forEach(input => {
    input.addEventListener("blur", (e) => {
        let notification = input.parentElement.querySelector(".form__message");

        if (input.value === "") {
            notification.innerHTML = '* Vui lòng nhập ngày sinh của bạn!';

        } else {
            notification.innerHTML = '';
        }
    })
})

// END CHECK FORM ĐĂNG KÝ

// Ẩn hiện mật khẩu 
const eyeToggle = document.querySelectorAll(".js-show-password");

eyeToggle.forEach(item => {
    item.addEventListener("click", function () {

        let inputPasswordToggle = this.parentElement.querySelector(".js-password-input");
        if (inputPasswordToggle.type === "password") {
            this.innerHTML = '<i class="far fa-eye-slash"></i>';
            this.parentElement.querySelector(".js-password-input").setAttribute("type", "text");

        } else {
            this.innerHTML = '<i class="far fa-eye"></i>';
            this.parentElement.querySelector(".js-password-input").setAttribute("type", "password");
        }
    })
})