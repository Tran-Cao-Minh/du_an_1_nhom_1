window.addEventListener('load', function () {
    // check họ tên
    const inputNameList = document.querySelectorAll(".js-name-input");

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

})