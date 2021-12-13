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
        checkPay();
      }
    })
  })

  const payName = document.querySelector('.js-name-pay-inf');
  const payPhone = document.querySelector('.js-phone-pay-inf');
  const payAddress = document.querySelector('.js-address-pay-inf');
  const payNote = document.querySelector('.js-note-pay-inf');

  function checkPay () {
    let checkPay = true;

    if (payName.value == '') {
      let notification = payName.parentElement.querySelector('.js-pay-notification');
      notification.innerHTML = 'Bạn vui lòng nhập họ và tên của người nhận';
      checkPay = false;
    } else {
      let notification = payName.parentElement.querySelector('.js-pay-notification');
      notification.innerHTML = '';
    }

    if (payPhone.value == '') {
      let notification = payPhone.parentElement.querySelector('.js-pay-notification');
      notification.innerHTML = 'Bạn vui lòng nhập số điện thoại của người nhận';
      checkPay = false;

    } else if (!payPhone.value.match(/^\d{10,11}$/)) {
      let notification = payPhone.parentElement.querySelector('.js-pay-notification');
      notification.innerHTML = 'Bạn vui lòng nhập đúng định dạng số điện thoại';
      checkPay = false;
      
    } else {
      let notification = payPhone.parentElement.querySelector('.js-pay-notification');
      notification.innerHTML = '';
    }
    
    if (payAddress.value == '') {
      let notification = payAddress.parentElement.querySelector('.js-pay-notification');
      notification.innerHTML = 'Bạn vui lòng nhập địa chỉ người nhận';
      checkPay = false;
    } 

    if (checkPay == true) {
      $.ajax({
        url: '../../../../../du_an_1_nhom_1/ajax/ajax_confirm_pay.php',
        type: 'GET',
        dataType: 'html',
        data: {
          customer_name: payName.value,
          customer_phone: payPhone.value, 
          customer_address: payAddress.value,
          order_note: payNote.value
        }
      }).done(function () {
        localStorage.removeItem('productInCart');
        window.location="index.php?page=pay_success";
      })
    }
  }
})