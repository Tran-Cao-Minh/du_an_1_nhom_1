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