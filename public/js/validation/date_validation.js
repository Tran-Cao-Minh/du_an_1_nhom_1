window.addEventListener('load', function () {
    // check ngày sinh
    const inputDateList = document.querySelectorAll(".js-date-input");

    inputDateList.forEach(input => {
        input.addEventListener("input", (e) => {
            let notification = input.parentElement.querySelector(".form__message");

            if (input.value === "") {
                notification.innerHTML = '* Vui lòng nhập ngày sinh của bạn!';

            } else {
                notification.innerHTML = '';
            }
        })
    })
})