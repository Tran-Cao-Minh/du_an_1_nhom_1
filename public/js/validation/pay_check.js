$(document).ready(function () {
  $('.js-pay-btn').click(function () {
    $.ajax({
      url: '../ajax/ajax_pay_check.php',
      type: 'GET',
      dataType: 'html',
      data: {
        noValue : '',
      }
    }).done(function (data) {
      console.log(data);
      if (data === "null") {
        const signInBtn = document.querySelectorAll('.js-btn-sign-in');
        const overlay = document.querySelector('.overlay');
        const overlayFour = document.querySelector('.overlay-4');
      
        signInBtn.forEach(btn => {
          // Mở form đăng nhập
          btn.addEventListener('click', () => {
            overlayFour.classList.remove("overlay--active-4");
            overlay.classList.add("overlay--active");
          })
        })
      
      } else {
        window.location="index.php?page=pay_success";
      }
    })
  })

})